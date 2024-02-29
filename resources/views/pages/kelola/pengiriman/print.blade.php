<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PRINT RESI</title>
    <link rel="stylesheet" href="css/printresi.css">
</head>

<body>
    <table border="1">
        @if ($perusahaan->count() < 1)
            <tr>
                <td style="border-right:none;text-align: center" rowspan="3"><img src="logoperusahaan/pjexpress.jpeg"
                        width="70"></td>
                <td style="border-left:none" colspan="3" rowspan="3">
                    <span style="font-size:18px"><strong>PT PANG JAYA EXPRESS</strong></span> <span
                        style="color:#fff">....</span> <br>
                    <span style="font-size:11px">Alamat : Jalan Raya Cijulang <br> Kabupaten Pangandaran 46394,
                        Indonesia <br>
                        Telp. +62 85323251840 </span>
                </td>
                <td height="20" align="center" colspan="2"><strong>BUKTI TANDA TERIMA PENGIRIMAN BARANG</strong>
                </td>
            </tr>
        @else
            <tr>
                <td style="border-right:none;text-align: center" rowspan="3"><img
                        src="logoperusahaan/pjexpress.jpeg" width="70"></td>
                <td style="border-left:none" colspan="3" rowspan="3">
                    <span style="font-size:18px"><strong>{{ $perusahaan[0]->name }}</strong></span> <span
                        style="color:#fff">....</span> <br>
                    <span style="font-size:11px"> {{ $perusahaan[0]->alamat }}<br>
                      Kontak:  {{ $perusahaan[0]->kontak }}</span>
                </td>
                <td height="20" align="center" colspan="2"><strong>BUKTI TANDA TERIMA PENGIRIMAN BARANG</strong>
                </td>
            </tr>
        @endif

        <tr>
            <td height="20" align="center">NO. PENGIRIMAN</td>
            <td align="center" rowspan="2"><span style="font-size:25px"><strong>ASLI</strong></span></td>
        </tr>

        <tr>
            <td height="45" align="center"><strong>{{ $pengiriman->no_pengiriman }}</strong></td>
        </tr>

        <tr>
            <td style="padding-left:10px;" colspan="4" rowspan="3">
                PENERIMA : {{ $pengiriman->nama_penerima }}<br>
                ALAMAT : {{ $pengiriman->alamat_penerima }}
            </td>
            <td height="20" align="center">NAMA BARANG</td>
            <td style="padding-left:3px;" height="20" align="center"><span style="color:#fff">..</span>QTY<span
                    style="color:#fff">..</span></td>
        </tr>

        <tr>
            <td height="45" align="center"><strong>{{ $pengiriman->nama_barang }}</strong></td>
            <td height="45" align="center"><strong>{{ $pengiriman->jumlah_barang }}</strong></td>
        </tr>

        <tr>
            <td height="20" align="center" colspan="2" >ISI TIDAK DIPERIKSA</td>
        </tr>

        <tr>
            <td style="paddmg-left:10px;" colspan="4" rowspan="3">
                PENGIRIM : {{ $pengiriman->pelanggan->name }}<br>
                ALAMAT : {{ $pengiriman->pelanggan->alamat }}
            </td>
        </tr>

        <tr>
            <td height="20" align="center">PERINCIAN / BERAT</td>
            <td height="20" align="center">ONGKIR</td>
        </tr>

        <tr>
            <td height="45" align="center"><strong></strong></td>
            <td style="padding-left:3px;" height="45">Rp. {{ number_format($pengiriman->biaya_kirim, 0, ',', '.') }}
            </td>
        </tr>

        <tr>
            <td height="20" colspan="2" align="center"><strong>TAGIH PENERIMA</strong></td>
            <td height="20" colspan="2" align="center"><strong>LUNAS</strong></td>
            <td height="20" align="center"><strong>TOTAL BAYAR</strong></td>
            <td style="padding-left:3px;" height="20">JML. <strong>Rp.
                    {{ number_format($pengiriman->biaya_kirim, 0, ',', '.') }}</strong></td>
        </tr>

        <tr>
            <td height="20" align="center">PENERIMA</td>
            <td height="20" align="center">TGL</td>
            <td height="20" align="center">PENGIRIM</td>
            <td height="20" align="center">TGL</td>
            <td style="font-size:9px;padding-left:3px;" rowspan="4" valign="middle">
                BARANG YG TIDAK DI ASURANSI JIKA <br> TERJADI : HURU HARA, PERAMPOKAN, <br> LAKALANTAS, FORCE MOUJER
                TIDAK <br> DIJAMIN <br>
                @php
                    use Carbon\Carbon;
                @endphp

                KIRIMAN YG TDK DIAMBIL SETELAH <br> 15 HARI DARI TGL PENGIRIMAN, <br> KERUSAKAN & KEHILANGAN <br> DILUAR
                TANGGUNG JAWAB PT ME
            </td>
            <td align="center" rowspan="4"><img src="logoperusahaan/pjexpress.jpeg" width="50"></td>
        </tr>

        <tr>
            <td align="center" rowspan="3"></td>
            <td align="center"></td>
            <td align="center" rowspan="3"></td>
            <td height="18" align="center">{{ Carbon::parse($pengiriman->tgl_pengiriman)->format('d') }}</td>
        </tr>

        <tr>
            <td align="center"></td>
            <td height="18" align="center">{{ Carbon::parse($pengiriman->tgl_pengiriman)->format('m') }}</td>
        </tr>

        <tr>
            <td align="center"></td>
            <td height="18" align="center">{{ Carbon::parse($pengiriman->tgl_pengiriman)->format('Y') }}</td>
        </tr>

        <tr>
            <td height="20" colspan="6" align="center">CATATAN : ALAMAT PENERIMA ADALAH DIDALAM KOTA ATAU DALAM
                BATAS WILAYAH PENGIRIMAN BARANG</td>
        </tr>

    </table>
</body>

</html>
