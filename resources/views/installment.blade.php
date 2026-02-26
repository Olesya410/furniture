@extends('layouts.add')

@section('title', 'Каталог')

@section('content')
<div class="container-garantee">
    <div class="info-garantee">
        <h1 >Гарантии и возврат</h1>
        <ul>
            <li><a href="{{ route('guarantees') }}">Гарантия</a></li>
            <li><a href="{{ route('delivery_pay') }}">Доставка и оплата</a></li>
            <li><a href="{{ route('installment') }}">Рассрочка</a></li>
        </ul>
    </div>
<div class="advantages-container">
    <h1>Преимущества покупки в рассрочку или кредит</h1>
    
    <ul>
        <li class="benefit-item"><strong>Отсутствие переплаты:</strong> Нет дополнительных процентов при покупке товара в рассрочку.</li>
        <li class="benefit-item"><strong>Доступность:</strong> Возможность приобретения мебели даже при недостаточном количестве денег (оформление возможно без первого взноса).</li>
        <li class="benefit-item"><strong>Оптимизация финансов:</strong> Свободное использование имеющихся средств на важные потребности.</li>
        <li class="benefit-item"><strong>Больше возможностей:</strong> Можно купить сразу весь комплект необходимой мебели или выбрать более дорогой вариант.</li>
        <li class="benefit-item"><strong>Нет необходимости откладывать покупку:</strong> Нет надобности долго копить деньги перед покупкой.</li>
        <li class="benefit-item"><strong>Удобный срок оплаты:</strong> Период рассрочки составляет 6 месяцев.</li>
        <li class="benefit-item"><strong>Досрочное погашение:</strong> Вы можете погасить задолженность досрочно без штрафов.</li>
    </ul>
    
    <h2 style="background-color:#ffd700;color:black;">Условия оформления рассрочки</h2>
    
    <ol class="terms-list">
        <li>Необходим только паспорт гражданина РФ;</li>
        <li>Возраст заемщика – от 18 лет;</li>
        <li>Необходимо наличие стабильного источника доходов (для пенсионеров тоже доступно);</li>
    </ol>
</div>
</div>
@endsection

