# Wakanda Restaurant
**วิธีการติดตั้งระบบ**
1. Clone Project  
    ```git clone https://github.com/ChotikaLuangorachorn/Wakanda_Restaurant.git```
2. สร้าง Database ชื่อ wakandadb
3. copy ไฟล์ .env.example และวางโดยเปลี่ยนชื่อไฟล์ที่ copy มาเป็น ชื่อไฟล์ .env แก้  
    DB_DATABASE=wakandadb ส่วน DB_USERNAME,DB_PASSWORD กำหนดตามที่คุณต้องการ
4. รันคำสั่ง composer update
5. รันคำสั่ง npm install และ npm run watch
6. รันคำสั่ง php artisan key:generate
7. รันคำสั่ง php artisan migrate --seed
4. URLของร้านอาหาร เริ่มที่  
    ```{local-host}/home```  
   เพื่อลงชื่อเข้าใช้แต่ละ role:
    - owner : email=admin@example.com, password=adminpassword
    - chef : email=chef@example.com, password=chefpassword
    - waiter : email=waiter@example.com, password=waiterpassword
   URLของลูกค้า เริ่มที่  
    ```การสแกนQR Code ของแต่ละโต๊ะ หรือ {local-host}/customer/{หมายเลขโต๊ะ}```  
    QR Code ของโต๊ะ ตัวอย่าง อยู่ที่: public/images/table_qr  

**อธิบายโครงสร้าง directory**
##### Folder #####
* public
    - images - รูปทั้งหมด
        - menu - รูปเมนูอาหาร
        - theme - รูปที่ใช้ในการทำ Header และ  Background
        - table_qr - รูป QR code ของแต่ละโต๊ะ

* routes - แบ่ง route ตาม role
    - web.php - ของ Customer
    - web_home.php - ของหน้าหลัก
    - web_chef.php - ของ Chef
    - web_owner.php - ของ Owner
    - web_waiter.php - ของ Waiter
* resources
    - assets
        - js
            - chef
            - customer
            - home
        - sass 
            - app.scss เก็บ style ขอเว็บทั้งหมด
    - views
        - layouts
        - home
        - chef
        - customer
        - owner
        - waiter
* app
    - Http/Controllers 
        - chef
        - customer
        - home
        - owner
        - waiter
    - Category.php
    - Dining_table.php
    - Menu.php
    - Order.php
    - Receipt.php
    - User.php
* database มี migrations, factories, และ seeds
- Schema_Wakanda.jpg : Schema ของโปรเจค
- หน้าที่ความรับผิดชอบ กลุ่ม Wakanda
