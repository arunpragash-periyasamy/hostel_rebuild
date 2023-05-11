from selenium import webdriver
from selenium.webdriver.common.keys import Keys
import time

# Replace with your WhatsApp contact name or group name
contact_name = "My Contact"

# Replace with your message
message = "Hello, this is a test message sent from Python."

# Set up Brave browser with WhatsApp Web
options = webdriver.ChromeOptions()
options.binary_location = '/snap/bin/brave'
driver = webdriver.Chrome(options=options)
driver.get("https://web.whatsapp.com/")

# Wait for user to scan the QR code and login
input("Scan the QR code and press Enter to continue...")

# Find the contact input field and enter the contact name
contact_input = driver.find_element_by_xpath("//input[@title='Search or start new chat']")
contact_input.send_keys(contact_name)
time.sleep(1)

# Find and click the contact from the search result
contact = driver.find_element_by_xpath(f"//span[@title='{contact_name}']")
contact.click()
time.sleep(1)

# Find the message input field and enter the message
message_input = driver.find_element_by_xpath("//div[@class='_3uMse']")
message_input.send_keys(message)
message_input.send_keys(Keys.ENTER)

# Close the browser
driver.quit()

print("Message sent successfully.")
