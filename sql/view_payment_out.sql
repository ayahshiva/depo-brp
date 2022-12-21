SELECT 
	payment_out.id AS id_payment_out, payment_out.do_number AS do_number, payment_out.invoice, payment_out.id_emkl AS id_emkl, emkl.nama AS nama_emkl, move_out.id_vessel AS id_vessel, vessel.nama AS nama_vessel, payment_out.no_voyage AS no_voyage, payment_out.metode AS metode, payment_out.kode AS kode, move_out.id AS id_move_out, move_out.jumlah AS jumlah, move_out.tanggal AS tanggal
FROM 
	payment_out
LEFT JOIN 
	emkl
ON
	payment_out.id_emkl = emkl.id
LEFT JOIN
	move_out
ON
	payment_out.id_move_out = move_out.id
LEFT JOIN
	vessel
ON
 move_out.id_vessel = vessel.id
ORDER BY 
	payment_out.tanggal DESC 