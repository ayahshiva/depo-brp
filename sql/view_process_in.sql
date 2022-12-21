SELECT 
	detil_move_in.id as id_detil_in, container.id AS id_container, container.no_cont AS no_container, container.stok AS stok, 
	detil_move_in.date_in AS date_in, detil_move_in.time_in AS time_in, detil_move_in.truck_in AS truck_in,
	payment_in.kode
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
WHERE
	container.stok = '1' OR container.stok = '2' OR container.stok = '3'
GROUP BY
	detil_move_in.id
ORDER BY
		detil_move_in.id DESC 