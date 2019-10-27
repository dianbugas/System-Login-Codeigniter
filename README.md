# Kontribusi-Waket 3 STT Nurul FIkri
# CARA INSTALL
a. Setelah di clone atau didownload, ubah nama directory terlebih dahulu menjadi waket3, kemudian pindahkan ke direktory   	   C:/xampp/htdocs (untuk windows). /var/www/html (Untuk apache2). /opt/lampp/htdocs (Pengguna linux)
b. Import database melalui phpmyadmin yang berada didalam direktory beastudi/db, dengan nama database wpu_login
c. masuk ke direktory waket3->application->config->buka file config, kemudian  ubah code di baris 26 menjadi $config['base_url'] = 'http://localhost/waket3/';   
d. aplikasi sudah dapat digunakan. buatlah akun user. maka akan meminta verifikasi via email.
