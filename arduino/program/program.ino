#include <Wire.h>
#include <LiquidCrystal_I2C.h>
#include <Keypad.h>
#include <MFRC522.h>
#include <SPI.h>

const byte ROWS = 4; // Four rows
const byte COLS = 3; // Three columns

#define BUZZER_PIN A0

char keys[ROWS][COLS] = {
  {'1','2','3'},
  {'4','5','6'},
  {'7','8','9'},
  {'*','0','#'}
};

byte rowPins[ROWS] = {8, 7, 6, 5}; //connect to the row pinouts of the keypad
byte colPins[COLS] = {4, 3, 2}; //connect to the column pinouts of the keypad

#define SS_PIN 10 // Define the Slave Select (SS) pin for RFID module
#define RST_PIN 9 // Define the Reset (RST) pin for RFID module

Keypad keypad = Keypad( makeKeymap(keys), rowPins, colPins, ROWS, COLS );

LiquidCrystal_I2C lcd(0x27, 20, 4); // Set the LCD address to 0x27 for a 20 chars and 4 line display

MFRC522 mfrc522(SS_PIN, RST_PIN);  // Create MFRC522 instance.

const int pinLength = 4; // Length of the PIN
const char correctPIN[pinLength + 1] = "1234"; // Change this to your desired PIN

char enteredPIN[pinLength + 1]; // Buffer to store the entered PIN

int isResetNeeded = 0; // check if reset is requested
bool isInMenu = true; // Flag to indicate whether the system is in the main menu

void buzzerNotification(int delaySeconds=500)
{
  // Inside functions where you want to activate the buzzer, add the following line:
  tone(BUZZER_PIN, 2000); // Activate the buzzer at 2000 Hz

  // Add a delay if you want the buzzer to sound for a specific duration
  delay(delaySeconds); // Sound the buzzer for 500 milliseconds (0.5 seconds)

  // After the delay, turn off the buzzer
  noTone(BUZZER_PIN);
}

void setup() {
  lcd.init();
  lcd.backlight();
  displayMenu(); // Display the main menu options initially
  SPI.begin();              // Init SPI bus
  mfrc522.PCD_Init();   // Initialize MFRC522 card reader.
  pinMode(BUZZER_PIN, OUTPUT); // Set the buzzer pin as an output
  buzzerNotification(200);
}

void loop() {
  char key = keypad.getKey();

  if (isInMenu && key) { // Check if the system is in the main menu and a key is pressed
    switch (key) {
      case '1':
        createTransaction();
        break;
      case '2':
        checkBalance();
        break;
      default:
        break;
    }
  }
}

void displayMenu() {
  lcd.clear();
  lcd.setCursor(0, 0);
  lcd.print("  POS Machine ");
  lcd.setCursor(0, 2);
  lcd.print("1). Create Transfer");
  lcd.setCursor(0, 3);
  lcd.print("2). Balance");
}

void createTransaction() {
  lcd.clear();
  lcd.setCursor(0, 0);
  lcd.print("Enter amount:");
  lcd.setCursor(0, 1);
  lcd.print("Rs ");
  static String amount = ""; // Variable to store the entered amount

  char key;

  isInMenu = false; // Set flag to false to disable main menu input

  while (true) {
    key = keypad.getKey();

     if (isResetNeeded == 1)
    {
      amount = "";
      isResetNeeded = 0;
    }

    if (key == '*') {
      if (amount.length() > 0) {
        amount.remove(amount.length() - 1);
        lcd.clear();
        lcd.setCursor(0, 0);
        lcd.print("Enter amount:");
        lcd.setCursor(0, 1);
        lcd.print("Rs ");
        lcd.print(amount);
      }
    } else if (key == '#') {
      if (amount.length() > 0) {
        lcd.clear();
        scanCard();
        waitForPIN();
        delay(2000); // Add a delay after completing the transaction
        isInMenu = true; // Set flag to true to enable main menu input
        displayMenu(); // Show the main menu again
        break; // Exit the loop after completing the transaction
      }
    } else if (isDigit(key) && amount.length() < 6) {
      amount += key;
      lcd.print(key);
    }
  }
}

void checkBalance() {
  // Function to check balance
  lcd.clear();
  lcd.setCursor(0, 0);
  lcd.print("Checking Balance...");
  delay(2000); // Simulate checking balance process
  buzzerNotification();
  lcd.clear();
  lcd.setCursor(0, 0);
  lcd.print("Your balance is:");
  // Display balance or fetch from a database and display here
  lcd.setCursor(0, 2);
  lcd.print("Rs 0000.00");
  delay(2000); // Add a delay after displaying balance
  isInMenu = true; // Set flag to true to enable main menu input
  displayMenu(); // Show the main menu again
}

void scanCard() {
  lcd.clear();
  lcd.setCursor(0, 0);
  lcd.print("Please place your");
  lcd.setCursor(0, 1);
  lcd.print("campus card on to");
  lcd.setCursor(0, 2);
  lcd.print("the scanner.. ");

  buzzerNotification(300);

  bool cardDetected = false;

  // Loop until a card is detected
  while (!cardDetected) {
    // Check for new cards.
    if (mfrc522.PICC_IsNewCardPresent() && mfrc522.PICC_ReadCardSerial()) {
      // Get card UID.
      lcd.clear();
      lcd.setCursor(0, 0);
      lcd.print("Verifying Card...");
      delay(2000);

      String cardUID = "";
      for (byte i = 0; i < mfrc522.uid.size; i++) {
        cardUID += String(mfrc522.uid.uidByte[i] < 0x10 ? "0" : "");
        cardUID += String(mfrc522.uid.uidByte[i], HEX);
      }

      // Print card UID to LCD.
      lcd.clear();
      lcd.setCursor(0, 0);
      lcd.print("Initiating");
      lcd.setCursor(0, 1);
      lcd.print("transaction....");

      // Halt PICC.
      mfrc522.PICC_HaltA();
      // Stop encryption on PCD.
      mfrc522.PCD_StopCrypto1();

      cardDetected = true; // Set flag to true to exit the loop
    }
  }
  buzzerNotification();
}

void waitForPIN() {
  lcd.clear();
  lcd.setCursor(0, 0);
  lcd.print("Please Enter PIN :");
  lcd.setCursor(0, 1);

  int index = 0;
  char key;

  while (index < pinLength) {
    key = keypad.getKey();
    if (key && isDigit(key)) {
      enteredPIN[index++] = key;
      lcd.setCursor(index - 1, 1);
      lcd.print('*');
    }
  }

  enteredPIN[pinLength] = '\0';

  if (strcmp(enteredPIN, correctPIN) == 0) {
    lcd.clear();
    lcd.setCursor(0, 0);
    lcd.print("Success!");
    isResetNeeded = 1;
    buzzerNotification(1000);
    // Do something when PIN is correct, like completing the transaction
  } else {
    lcd.clear();
    lcd.setCursor(0, 0);
    lcd.print("Incorrect PIN!");
    delay(2000); // Display incorrect message for 2 seconds
    lcd.clear();
    lcd.setCursor(0, 0);
    isResetNeeded = 1;
    buzzerNotification();
    lcd.print("Enter amount:");
    lcd.setCursor(0, 1);
  }
}