import serial
import requests

# Open serial connection
ser = serial.Serial('COM6', 9600)  # Adjust the port accordingly
print("Serial connection established")

# Main loop
while True:
    # Read data from serial port
    data = ser.readline().strip().decode('utf-8')
    
    if data == "END":
        print("Received termination signal. Closing serial connection.")
        ser.close()
        break
    
    # Assuming data is card ID, send it to server
    print("Received Card ID:", data)
    server_url = "http://gym.w3x.live/api/attendance/mark";
    data = {'rfid': data}
    headers = {'Accept': 'application/json'}
    response = requests.post(server_url, data=data, headers=headers)

    # Print server response
    print("Server Response:", response.text)
