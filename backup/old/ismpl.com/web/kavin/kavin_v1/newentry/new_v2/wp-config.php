<?php
/** 
 * Konfigurasi dasar WordPress.
 *
 * Berkas ini berisi konfigurasi-konfigurasi berikut: Pengaturan MySQL, Awalan Tabel,
 * Kunci Rahasia, Bahasa WordPress, dan ABSPATH. Anda dapat menemukan informasi lebih
 * lanjut dengan mengunjungi Halaman Codex {@link http://codex.wordpress.org/Editing_wp-config.php
 * Menyunting wp-config.php}. Anda dapat memperoleh pengaturan MySQL dari web host Anda.
 *
 * Berkas ini digunakan oleh skrip penciptaan wp-config.php selama proses instalasi.
 * Anda tidak perlu menggunakan situs web, Anda dapat langsung menyalin berkas ini ke
 * "wp-config.php" dan mengisi nilai-nilainya.
 *
 * @package WordPress
 */

// ** Pengaturan MySQL - Anda dapat memperoleh informasi ini dari web host Anda ** //
/** Nama basis data untuk WordPress */
define('DB_NAME', 'kavin');

/** Nama pengguna basis data MySQL */
define('DB_USER', 'kavin');

/** Kata sandi basis data MySQL */
define('DB_PASSWORD', 'kavin2005');

/** Nama host MySQL */
define('DB_HOST', 'localhost');

/** Set Karakter Basis Data yang digunakan untuk menciptakan tabel basis data. */
define('DB_CHARSET', 'utf8');

/** Jenis Collate Basis Data. Jangan ubah ini jika ragu. */
define('DB_COLLATE', '');

/**#@+
 * Kunci Otentifikasi Unik.
 * 
 * Ubah baris berikut menjadi frase unik!
 * Anda dapat menciptakan frase-frase ini menggunakan {@link http://api.wordpress.org/secret-key/1.1/ Layanan kunci-rahasia WordPress.org}
 * 
 * @since 2.6.0
 */
define('AUTH_KEY', 'letakkan frase unik Anda di sini');
define('SECURE_AUTH_KEY', 'letakkan frase unik Anda di sini');
define('LOGGED_IN_KEY', 'letakkan frase unik Anda di sini');
define('NONCE_KEY', 'letakkan frase unik Anda di sini');
/**#@-*/

/**
 * Awalan Tabel Basis Data WordPress.
 * 
 * Anda dapat memiliki beberapa instalasi di dalam satu basis data jika Anda memberikan awalan unik 
 * kepada masing-masing tabel. Harap hanya masukkan angka, huruf, dan garis bawah!
 */
$table_prefix  = 'new_v2_';

/**
 * Bahasa Lokal WordPress. Bila nilainya kosong secara standar Bahasa Inggris akan digunakan.
 *
 * Ubah ini untuk melokalkan WordPress. Berkas MO yang bersangkutan harus 
 * diinstal di wp-content/languages. Sebagai contoh, instal
 * id_ID.mo ke wp-content/languages dan tentukan WPLANG ke "id_ID" untuk mengaktifkan
 * dukungan Bahasa Indonesia. Dalam paket distribusi ini berkas id_ID.mo sudah terinstal.
 */
define ('WPLANG', 'id_ID');

/* Cukup, berhenti menyunting! Selamat ngeblog. */

/** Lokasi absolut direktori WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Menentukan variabel-variabel WordPress dan menyertakan berkas-berkas. */
require_once(ABSPATH . 'wp-settings.php');
?>
