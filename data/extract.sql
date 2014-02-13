-- Extract real data from database to `tmp_weights` table

DROP TABLE IF EXISTS `tmp_weights`;
CREATE TABLE `tmp_weights` (
  `orders_id` INT(11) UNSIGNED NOT NULL,
  `count` INT(11) UNSIGNED NOT NULL,
  `weight` DECIMAL(8,3) UNSIGNED NOT NULL
  ) ENGINE=MYISAM;

INSERT INTO tmp_weights

SELECT orders_items.orders_id, orders_items.count, items.weight * 0.454 AS weight
FROM orders_items 
JOIN items ON orders_items.items_id = items.id
JOIN (SELECT orders_items.orders_id
  FROM orders_items
  JOIN items ON orders_items.items_id = items.id
  GROUP BY orders_id
  HAVING SUM(orders_items.count * items.weight * 0.454) > 20) AS `minweight` ON minweight.orders_id = orders_items.orders_id
WHERE items.weight * 0.454 <= 20
ORDER BY orders_id;