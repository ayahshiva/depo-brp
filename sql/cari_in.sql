SELECT 
	container.id id_container, container.no_cont no_container,
	detil_payment_in.id id_detil_pay_in, payment_in.id_emkl id_emkl, emkl.nama nama_emkl, payment_in.no_voyage no_voyage, payment_in.do_number do_number, payment_in.kode kode, move_in.id id_move_in, move_in.id_vessel id_vessel, vessel.nama nama_vessel, detil_move_in.date_in date_in
FROM
	container
LEFT JOIN
	detil_payment_in
ON
	container.id = detil_payment_in.id_container
LEFT JOIN
	payment_in
ON
	detil_payment_in.id_payment_in = payment_in.id
LEFT JOIN
	move_in
ON
	payment_in.id_move_in = move_in.id
LEFT JOIN
	detil_move_in
ON
	move_in.id = detil_move_in.id_move_in
LEFT JOIN
	emkl
ON
	payment_in.id_emkl = emkl.id
LEFT JOIN
	vessel
ON
	payment_in.id_vessel = vessel.id
GROUP BY
	detil_payment_in.id 