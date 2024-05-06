import serial
import requests

# Open serial connection
ser = serial.Serial('COM6', 9600)  # Adjust the port accordingly
print("Serial connection established")

# Main loop
while True:
    # Read data from serial port
    card_id = ser.readline().strip().decode('utf-8')
    print("Received Card ID:", card_id)

    # Send data to server
    server_url = "http://127.0.0.1:8000/api/attendance/mark";
    data = {'rfid': card_id}
    headers = {'Accept': 'application/json'}
    response = requests.post(server_url, data=data, headers=headers)

    # Print server response
    print("Server Response:", response.text)
