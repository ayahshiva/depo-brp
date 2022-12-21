SELECT 
	move_out.id as id_move_out, move_out.tanggal AS tanggal, move_out.id_emkl AS id_emkl, move_out.id_vessel AS id_vessel, move_out.no_voyage AS no_voyage, move_out.jumlah as jumlah, emkl.nama AS nama_emkl, vessel.nama AS nama_vessel
FROM
	move_out
LEFT JOIN
	emkl
ON
	move_out.id_emkl = emkl.id
LEFT JOIN 
	vessel
ON
	move_out.id_vessel = vessel.id

ORDER BY
	move_out.tanggal DESC 