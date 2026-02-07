<?php
declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use BookVerse\Domain\{Author, Book, Money, Cart, OrderFactory};
use BookVerse\Domain\Pricing\{NoDiscount, PercentageDiscount};
use BookVerse\Application\{CheckoutService, OrderPricing};
use BookVerse\Functional as F;

// Seed
$author = new Author('Isabel', 'Allende');
$book1  = new Book('978-84-376-0494-7', 'La casa de los espíritus', $author, Money::of(1599, 'EUR'));
$book2  = new Book('978-84-376-0000-0', 'Cuentos de Eva Luna', $author, Money::of(1299, 'EUR'));

// Cart
$cart = new Cart('EUR');
$cart->addItem($book1, 1);
$cart->addItem($book2, 2);

// POO con Strategy
$checkoutNoDiscount = new CheckoutService(new NoDiscount());
$checkout10         = new CheckoutService(new PercentageDiscount(0.10));

echo "[POO] Subtotal: " . $cart->subtotal()->format() . PHP_EOL;
echo "[POO] Total sin descuento: " . $checkoutNoDiscount->total($cart)->format() . PHP_EOL;
echo "[POO] Total con 10%: " . $checkout10->total($cart)->format() . PHP_EOL;

// PF pipeline
$totalPF = F\pipeline_total($cart->items(), 'EUR', 0.10);
echo "[FP ] Total con 10% (pipeline): " . $totalPF->format() . PHP_EOL;

// Crear Order con mezcla POO + FP
$orderFactory = new OrderFactory();
$orderPricing = new OrderPricing($orderFactory);
$order        = $orderPricing->fromCartWithDiscount($cart, 0.10);

echo "Order {$order->id()} total: " . $order->total()->format() . PHP_EOL;
