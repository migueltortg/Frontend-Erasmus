from selenium import webdriver
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.support.ui import Select
from selenium.webdriver.common.by import By
import openpyxl
import time

driver = webdriver.Chrome()
driver.get("file:///C:/xampp/htdocs/validacion/web/index.html")
elem_inputs = driver.find_elements(By.CSS_SELECTOR, "input[type='text'], input[type='password']")

def comprueba(vector, respuestas):
    # Re-locate the input elements before interacting with them
    elem_inputs = driver.find_elements(By.CSS_SELECTOR, "input[type='text'], input[type='password']")
    
    if len(elem_inputs) >= 2:
        elem_inputs[0].send_keys(vector[0])  # DNI
        elem_inputs[1].send_keys(vector[1])  # Contraseña

        # Locate the form and submit it
        form = driver.find_element(By.TAG_NAME, "form")

        submit_button = form.find_element(By.ID, "inputSubmit")
        submit_button.click()

dataframe = openpyxl.load_workbook("test.xlsx")
dataframe1 = dataframe.active

for row in range(1, dataframe1.max_row + 1):
    vector = [str(cell.value) if cell.value is not None else "" for cell in dataframe1[row]]
    respuestas = [str(cell.value) for cell in dataframe1[row][7:]]
    
    # Clear the form before entering new values
    driver.execute_script("document.forms[0].reset()")
    
    # Call the function to fill and submit the form
    comprueba(vector, respuestas)
    
    time.sleep(2)

time.sleep(5)
driver.quit()