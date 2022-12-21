SELECT 
	container.id id_container, container.no_cont no_cont,
	detil_move_in.date_in date_in,
	detil_move_in.id_move_in,
	payment_in.id_emkl id_emkl, payment_in.no_voyage no_voyage, payment_in.id_vessel id_vessel, payment_in.do_number do_number, payment_in.kode kode
FROM
	container
LEFT JOIN
	detil_move_in
ON
	container.id = detil_move_in.id_container
LEFT JOIN
	detil_payment_in
ON
	detil_move_in.id_container = detil_payment_in.id_container
LEFT JOIN
	payment_in
ON
	detil_payment_in.id_payment_in = payment_in.id
GROUP BY
	payment_in.no_voyage 