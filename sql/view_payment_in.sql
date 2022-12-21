SELECT 
	payment_in.id AS id_payment_in, payment_in.do_number AS do_number, payment_in.invoice, payment_in.id_emkl AS id_emkl, emkl.nama AS nama_emkl, payment_in.id_vessel AS id_vessel, vessel.nama AS nama_vessel, payment_in.no_voyage AS no_voyage, payment_in.metode AS metode, payment_in.kode AS kode
FROM 
	payment_in
LEFT JOIN 
	emkl
ON
	payment_in.id_emkl = emkl.id
LEFT JOIN
	vessel
ON
	payment_in.id_vessel = vessel.id
ORDER BY 
	payment_in.tanggal DESC 