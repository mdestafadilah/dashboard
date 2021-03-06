// ** I18N

// Calendar EN language
// Author: Mihai Bazon, <mihai_bazon@yahoo.com>
// Encoding: any
// Distributed under the same terms as the calendar itself.

// For translators: please use UTF-8 if possible.  We strongly believe that
// Unicode is the answer to a real internationalized world.  Also please
// include your contact information in the header, as can be seen above.

// full day names
Calendar._DN = new Array
("Minggu",
 "Senin",
 "Selasa",
 "Rabu",
 "Kamis",
 "Juma't",
 "Sabtu",
 "Minggu");

// Please note that the following array of short day names (and the same goes
// for short month names, _SMN) isn't absolutely necessary.  We give it here
// for exemplification on how one can customize the short day names, but if
// they are simply the first N letters of the full name you can simply say:
//
//   Calendar._SDN_len = N; // short day name length
//   Calendar._SMN_len = N; // short month name length
//
// If N = 3 then this is not needed either since we assume a value of 3 if not
// present, to be compatible with translation files that were written before
// this feature.

// short day names
Calendar._SDN = new Array
("Mng",
 "Sen",
 "Sel",
 "Rab",
 "kam",
 "Jum",
 "Sab",
 "Mng");

// First day of the week. "0" means display Sunday first, "1" means display
// Monday first, etc.
//Calendar._FD = 0;

// full month names
Calendar._MN = new Array
("Januari",
 "Pebruari",
 "Maret",
 "April",
 "Mei",
 "Juni",
 "Juli",
 "Agustus",
 "September",
 "Oktober",
 "Nopember",
 "Desember");

// short month names
Calendar._SMN = new Array
("Jan",
 "Peb",
 "Mar",
 "Apr",
 "Mei",
 "Jun",
 "Jul",
 "Agt",
 "Sep",
 "Okt",
 "Nop",
 "Des");

// tooltips
Calendar._TT = {};
Calendar._TT["INFO"] = "Tentang Kalender";

Calendar._TT["ABOUT"] =
"DHTML Date/Time Selector\n" +
"(c) dynarch.com 2002-2005 / Pembuat: Mihai Bazon\n" + 
" Dimodifikasi Untuk\n" +
"PT. Dwipa Manunggal Kontena \n"+
"oleh\n"+
"PT. Cakra Sakti Informatika";
Calendar._TT["ABOUT_TIME"] = "\n\n" +
"Time selection:\n" +
"- Click on any of the time parts to increase it\n" +
"- or Shift-click to decrease it\n" +
"- or click and drag for faster selection.";

Calendar._TT["PREV_YEAR"] = "Tahun Sebelumnya (tahan untuk menu)";
Calendar._TT["PREV_MONTH"] = "Bulan Sebelumnya (tahan untuk menu)";
Calendar._TT["GO_TODAY"] = "Menuju Hari ini";
Calendar._TT["NEXT_MONTH"] = "Bulan Selanjutnya (tahan untuk menu)";
Calendar._TT["NEXT_YEAR"] = "Tahun Selanjutnya (tahan untuk menu)";
Calendar._TT["SEL_DATE"] = "Pilih Tangal";
Calendar._TT["DRAG_TO_MOVE"] = "Geser Untuk Memindahkan";
Calendar._TT["PART_TODAY"] = " (Hari ini)";

// the following is to inform that "%s" is to be the first day of week
// %s will be replaced with the day name.
Calendar._TT["DAY_FIRST"] = "Tampilkan hari %s dahulu";

// This may be locale-dependent.  It specifies the week-end days, as an array
// of comma-separated numbers.  The numbers are from 0 to 6: 0 means Sunday, 1
// means Monday, etc.
Calendar._TT["WEEKEND"] = "0,6";

Calendar._TT["CLOSE"] = "Tutup Kalender";
Calendar._TT["TODAY"] = "Hari ini";
Calendar._TT["TIME_PART"] = "(Shift-)klik atau geser untuk merubah nilai";

// date formats
Calendar._TT["DEF_DATE_FORMAT"] = "%Y-%m-%d";
Calendar._TT["TT_DATE_FORMAT"] = "%a, %b %e";

Calendar._TT["WK"] = "Pekan";
Calendar._TT["TIME"] = "Pukul :";
