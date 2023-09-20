<?php
// Импорт классов для расчета стоимости доставки
require_once 'FastDelivery.php';
require_once 'SlowDelivery.php';

// Эмуляция данных отправлений (можно заменить на данные из БД)
$shipments = [
    ['sourceKladr' => '111', 'targetKladr' => '222', 'weight' => 10.5],
    ['sourceKladr' => '333', 'targetKladr' => '444', 'weight' => 5.0],
    // Добавьте больше отправлений по необходимости
];

// Инициализация классов доставки
$fastDelivery = new FastDelivery();
$slowDelivery = new SlowDelivery();

// Расчет стоимости и сроков доставки
foreach ($shipments as $shipment) {
    $resultFast = $fastDelivery->calculate($shipment['sourceKladr'], $shipment['targetKladr'], $shipment['weight']);
    $resultSlow = $slowDelivery->calculate($shipment['sourceKladr'], $shipment['targetKladr'], $shipment['weight']);

    // Приведение данных к единому виду
    $unifiedResultFast = [
        'price' => $resultFast['price'],
        'date' => date('Y-m-d', strtotime('+' . $resultFast['period'] . ' days')),
        'error' => $resultFast['error']
    ];
    $unifiedResultSlow = [
        'price' => 150 * $resultSlow['coefficient'],
        'date' => $resultSlow['date'],
        'error' => $resultSlow['error']
    ];

    // Вывод результатов (можно заменить на сохранение в БД)
    echo "Быстрая доставка: ";
    print_r($unifiedResultFast);
    echo "
";

    echo "Медленная доставка: ";
    print_r($unifiedResultSlow);
    echo "
";
}
?>
