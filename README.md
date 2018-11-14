# Create Disbursement Example : #
```
cd src/
php examples/create_disbursement_example.php "CUSTOM_ID_1"  30000 "BCA" "Rizky" "1234567890"
```

# Create Disbursement With Idempotency Key Example : #
```
cd src/
php examples/create_disbursement_with_idempotency_key_example.php "CUSTOM_ID_1"  30000 "BCA" "Rizky" "1234567890" "idempotencykeytest123"
```

# GET Disbursement Example : #
```
cd src/
php examples/get_disbursement_example.php "57ba93175ef9e7077bcb969e"
```

# Create Callback Virtual Account Example : #
```
cd src/
php examples/create_callback_virtual_account_example.php "CUSTOM_ID_2" "BCA" "Rizky"
```

# Create Callback Virtual Account With Virtual Account Number Example : #
```
cd src/
php examples/create_callback_virtual_account_example.php "CUSTOM_ID_2" "BCA" "Rizky" 100
```

# GET Balance Example : #
```
cd src/
php examples/get_balance_example.php
```