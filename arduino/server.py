import serial
import requests
import json
import sys

# Serial port configuration
port = 'COM6'
baudrate = 9600

# Bearer token for authorization
bearer_token = 'yKTyfjfgpMoxB7eDBxzO3CeuHo4XX41BlHnOvmllc4b671f0'

# POS server configuration
pos_server_url = 'http://127.0.0.1:8000/api/'
headers = {
    'Content-Type': 'application/json',
    'Authorization': f'Bearer {bearer_token}'
}

# Function to send data to the main server
def send_to_server(data):
    try:
        response = requests.post(pos_server_url, json=data, headers=headers)
        if response.status_code == 200:
            print("Data sent successfully to server!")
        else:
            print("Failed to send data to server:", response.status_code)
    except Exception as e:
        print("Error:", e)

# Function to fetch balance from the POS server
def fetch_balance_from_server():
    try:
        response = requests.get(pos_server_url + 'balance', headers=headers)
        if response.status_code == 200:
            balance_data = response.json()
            return balance_data['balance']
        else:
            print("Failed to fetch balance from server:", response.status_code)
            return None
    except Exception as e:
        print("Error:", e)
        return None

# Initialize serial communication
try:
    ser = serial.Serial(port, baudrate)
    print("Serial port opened successfully!")
except serial.SerialException as e:
    print("Failed to open serial port:", e)
    sys.exit(1)
try:
    while True:
        # Read data from Arduino
        data = ser.readline().decode().strip()

        # Check if Arduino requests balance
        if data == 'check-balance':
            # Fetch balance from server
            balance = fetch_balance_from_server()

            # Send balance to Arduino
            if balance is not None:
                ser.write("Balance: {}".format(balance).encode())
            else:
                ser.write(b'Error fetching balance')

        # Process the data as needed
        try:
            json_data = json.loads(data)
            # send_to_server(json_data)
            print(data)
        except json.JSONDecodeError:
            print("Invalid JSON data received from Arduino:", data)

except KeyboardInterrupt:
    print("Exiting script...")
    ser.close()  # Close the serial port before exiting
    sys.exit(0)