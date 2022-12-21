SELECT 
	detil_move_out.id as id_detil_out, container.id AS id_container, container.no_cont AS no_container, container.stok AS stok, 
	detil_move_out.date_out AS date_out, detil_move_out.time_out AS time_out, detil_move_out.truck_out AS truck_out,
	payment_out.kode
FROM
	container
LEFT JOIN
	detil_move_out
ON
	container.id = detil_move_out.id_container
LEFT JOIN
	detil_payment_out
ON
	detil_move_out.id_container = detil_payment_out.id_container
LEFT JOIN
	payment_out
ON
	detil_payment_out.id_payment_out = payment_out.id
WHERE
	container.stok = '4' OR container.stok = '5' OR container.stok = '6'
GROUP BY
	detil_move_out.id
ORDER BY
		detil_move_out.id DESC 