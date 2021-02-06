<style type="text/css">
	* {
		padding: 0;
		margin:0 auto;
	}

	#page {
		padding: 10px;
		border: 2px solid #000;
	}
</style>
<div id="page">
	<center><h2>Nota Pembayaran</h2></center><br>
	<table align="center">
		<tr>
			<td>Kode Order</td><td>:</td><td>#{{$pemesanan->kode_pemesanan}}</td>
		</tr>
		<tr>
			<td>Nama</td><td>:</td><td>{{$pemesanan->user->nama_lengkap}}</td>
		</tr>
		<tr>
			<td>Instansi</td><td>:</td><td>{{$pemesanan->user->nama_instansi}}</td>
		</tr>
		<tr>
			<td>No. Telp</td><td>:</td><td>{{$pemesanan->user->no_telp}}</td>
		</tr>
		<tr>
			<td>Reklame</td><td>:</td><td>{{$pemesanan->reklame->nama_jenis_reklame}}</td>
		</tr>
		<tr>
			<td>Klasifikasi</td><td>:</td><td>{{$pemesanan->reklame->kategori->nama_kategori}}</td>
		</tr>
		<tr>
			<td>Tanggal Pemasangan</td><td>:</td><td>{{$pemesanan->tanggal_awal_pemasangan->format('d F Y')}} s/d {{$pemesanan->tanggal_akhir_pemasangan->format('d F Y')}}</td>
		</tr>
		<tr>
			<td>Titik Reklame</td><td>:</td><td>{{$pemesanan->titik_reklame->lokasi}}</td>
		</tr>
		<tr>
			<td>Isi Reklame</td><td>:</td><td>{{$pemesanan->isi_reklame}}</td>
		</tr>
		<tr>
			<td>Harga</td><td>:</td><td>Rp. {{number_format($pemesanan->harga)}}</td>
		</tr>
		<tr>
			<td>Status Pembayaran</td><td>:</td><td><strong>LUNAS</strong></td>
		</tr>
	</table>
</div>
<script type="text/javascript">
	window.print()
</script>