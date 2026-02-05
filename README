# BookVerse — Guía práctica de POO y Programación Funcional en PHP

Repositorio educativo que acompaña la guía por capítulos de Programación Orientada a Objetos (POO) y Programación Funcional (PF) en PHP usando un dominio común: una librería online.

## Requisitos

- PHP 8.2+
- Composer

## Instalación

```bash
composer install
```

## Scripts útiles

- Ejecutar la demo integrada (POO + PF):
  ```bash
  composer demo
  ```
- Ejecutar pruebas:
  ```bash
  composer test
  ```

## Estructura

```
.
├─ composer.json
├─ phpunit.xml
├─ public/
│  ├─ index.php
│  └─ demo.php
├─ src/
│  ├─ Application/
│  │  ├─ CheckoutService.php
│  │  └─ OrderPricing.php
│  ├─ Domain/
│  │  ├─ Author.php
│  │  ├─ Book.php
│  │  ├─ BookRepository.php
│  │  ├─ Cart.php
│  │  ├─ CartItem.php
│  │  ├─ DomainException.php
│  │  ├─ Money.php
│  │  ├─ Order.php
│  │  ├─ OrderFactory.php
│  │  ├─ Payment/
│  │  │  ├─ PaymentMethod.php
│  │  │  └─ PaymentService.php
│  │  └─ Pricing/
│  │     ├─ NoDiscount.php
│  │     ├─ PercentageDiscount.php
│  │     └─ PricingStrategy.php
│  ├─ Functional/
│  │  ├─ CartFunctions.php
│  │  ├─ Collections.php
│  │  ├─ Currying.php
│  │  ├─ Immutability.php
│  │  ├─ Option.php
│  │  └─ RepoAdapters.php
│  └─ Shared/
│     └─ Timestamps.php
├─ tests/
│  └─ Domain/
│     └─ MoneyTest.php
└─ .gitignore
```

## Qué encontrarás

- POO: Entidades `Book`, `Author`, `Cart`, `Order`, objeto valor `Money`, estrategias de pricing (Strategy), factoría (Factory), repositorio en memoria (Repository), traits (`Timestamps`), excepciones de dominio.
- PF: Funciones puras para subtotales, `map/filter/reduce`, currying, pipelines, tipo `Option` básico para evitar `null`, adaptadores a repositorios.
- Demo integradora: calcula totales con POO (Strategy) y PF (pipeline) y crea una `Order`.

## Ejecutar la demo

```bash
composer demo
```

Verás salidas como:
```
[POO] Subtotal:  ...
[POO] Total sin descuento: ...
[POO] Total con 10%: ...
[FP ] Total con 10% (pipeline): ...
Order ord_... total: ...
```

## Ejecutar pruebas

```bash
composer test
```

## Siguientes pasos (ejercicios)

- Crear VO `Isbn` con validación por regex e incorporarlo a `Book`.
- Añadir `FreeShippingOverX` como otra `PricingStrategy`.
- Implementar `BookRepository` con PDO en `Infrastructure`.
- Añadir `Either` para manejar fallos de pago sin excepciones en PF.

> Consejos: combina OO para el modelado de dominio y PF para transformaciones/pipelines. Mantén objetos valor inmutables y expón comportamientos, no setters.
