
-- Создание таблицы для хранения данных о доставках
CREATE TABLE shipments (
    id INT PRIMARY KEY AUTO_INCREMENT,
    sourceKladr VARCHAR(255),
    targetKladr VARCHAR(255),
    weight FLOAT
);

-- Добавление примера данных в таблицу
INSERT INTO shipments (sourceKladr, targetKladr, weight) VALUES ('111', '222', 10.5);
INSERT INTO shipments (sourceKladr, targetKladr, weight) VALUES ('333', '444', 5.0);
