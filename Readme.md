# UNIKOM PHP Library
Library ini dipakai untuk Crawler di situ https://mahasiswa.unikom.ac.id, bisa dikombinasikan dengan Sistem Informasi yang akan kalian buat untuk tugas akhir atau pun yang tugas akhirnya bertempat di UNIKOM sendiri.

# Cara Instalasi
* Install terlebih dahulu composer
* lalu jalankan perintah **composer require igun997/unilib**
* lalu load ke dalam php **lnclude 'vendor/autoload.php'**
# Cara Pemakaian
Deklarasikan terlebih dahulu class dari package
```php
$init = new Unilib\Mhs(["username"=>"XXXX","password"=>"XXXX"]);
```
lalu ambil data yang kamu perlukan sebagai contoh saya akan mengambil data profile yang beralamat di https://mahasiswa.unikom.ac.id/profile maka sintaks nya sebagai berikut
```php
$init = new Unilib\Mhs(["username"=>"XXXX","password"=>"XXXX"]);
$res = $init->get('profile','div[class=inputbox]');
//div[class=inputbox] adalah tag HTML berserta class nya  sebagai contoh :
//<div class='inputbox'>10515211</div>
//Sesuaikan dengan data yang akan kalian cari
//masukan hanya bagian kata dari akhir penggalan link contoh :
//https://mahasiswa.unikom.ac.id/khs maka ambil 'khs' nya saja
echo $res[0]->innertext;
// Innertext masuk kedala dokumentasi simple_html_dom yang bisa kalian lihat di http://simplehtmldom.sourceforge.net/manual.htm

```

# Kontribusi
Publisher menerima bentuk kontribusi apapun selama itu tidak memberatkan pihak yang bersangkutan

# Masalah
Jika terjadi sebuah masalah dalam library UNIKOM maka bisa mengirimkan sebuah Issue terkait dengan permasalahan yang kalian alami

# Disclaimer
Publisher tidak membuat , memanipulasi atau menyimpan data dari pengguna library, library ini digunakan hanya sebagai salah satu alternatif dari aplikasi yang kalian buat.

# Kontak
Email : indra.gunanda@gmail.com
