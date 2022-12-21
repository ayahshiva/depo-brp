SELECT 
	container.id id_container, container.no_cont no_container,
	detil_payment_out.id id_detil_pay_out, payment_out.id_emkl id_emkl, emkl.nama nama_emkl, payment_out.no_voyage no_voyage, payment_out.do_number do_number, payment_out.kode kode, move_out.id id_move_out, move_out.id_vessel id_vessel, vessel.nama nama_vessel, detil_move_out.date_out date_out
FROM
	container
LEFT JOIN
	detil_payment_out
ON
	container.id = detil_payment_out.id_container
LEFT JOIN
	payment_out
ON
	detil_payment_out.id_payment_out = payment_out.id
LEFT JOIN
	move_out
ON
	payment_out.id_move_out = move_out.id
LEFT JOIN
	detil_move_out
ON
	move_out.id = detil_move_out.id_move_out
LEFT JOIN
	emkl
ON
	payment_out.id_emkl = emkl.id
LEFT JOIN
	vessel
ON
	move_out.id_vessel = vessel.id
WHERE
	container.no_cont='BEAU2691064'
GROUP BY
	detil_payment_out.id 