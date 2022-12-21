SELECT 
	move_in.id as id_move_in, move_in.tanggal AS tanggal, move_in.id_mlo AS id_mlo, move_in.id_vessel AS id_vessel, move_in.no_voyage AS no_voyage, move_in.jumlah as jumlah, mlo.nama AS nama_mlo, vessel.nama AS nama_vessel
FROM
	move_in
LEFT JOIN
	mlo
ON
	move_in.id_mlo = mlo.id
LEFT JOIN 
	vessel
ON
	move_in.id_vessel = vessel.id

ORDER BY
	move_in.id DESC 