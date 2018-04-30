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
   เพื่อลงชื่อเข้าใช้แต่ละ role: owner-> email=admin@example.com, password=adminpassword
   URLของลูกค้า เริ่มที่
    ```การสแกนQR Code ของแต่ละโต๊ะ```
    QR Code ของโต๊ะ ตัวอย่าง อยู่ที่: public/images/table_qr

**อธิบายโครงสร้าง directory**
##### Folder #####
