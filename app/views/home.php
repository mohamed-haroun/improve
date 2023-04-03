<h1 class="display-4 text-success text-center my-5">Home Page</h1>
<?php

$entityManager = new \Doctrine\ORM\EntityManager(
\runtime\DBConnection::connect(),
     \Doctrine\ORM\ORMSetup::createAttributeMetadataConfiguration([__DIR__ . "/../models"])
);


$items = [
    ['item 4', 3, 16],
    ['item 5', 1, 9.5],
    ['item 6', 2, 5.75],
];

//$invoice = (new \models\Invoice())
//    ->setAmount(30)
//    ->setInvoiceNumber('2')
//    ->setStatus(\Enums\InvoiceStatus::Paid)
//    ->setCreatedAt(new DateTime());
//
//foreach ($items as [$description, $quantity, $unitPrice]) {
//    $item = (new \models\InvoiceItem())
//        ->setDescription($description)
//        ->setQuantity($quantity)
//        ->setUnitPrice($unitPrice);
//
//    $invoice->addItem($item);
//}
//
//$entityManager->persist($invoice);

//$invoice = $entityManager->find(\models\Invoice::class, 1);
//
//$invoice->setStatus(\Enums\InvoiceStatus::Declined);
//
//$invoice->getItems()->get(0)->setDescription("Hot Item");
//
//$entityManager->flush();

$queryBuilder = $entityManager->createQueryBuilder();

$query = $queryBuilder
    ->select("i.amount", 'i.id')
    ->from(\models\Invoice::class, "i")
    ->where('i.amount < :amount')
    ->setParameter('amount', 100)
    ->getQuery();

$results = $query->getResult();

echo "<pre>";
var_dump($results);
echo "</pre>";
