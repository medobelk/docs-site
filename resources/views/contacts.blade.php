@extends('layouts.master')

@section('content')
  <section class="contacts">
    <div class="container">
      <div class="main">
        
        @include('layouts.question-list')

        <div class="main-info">
          <div class="contacts-map">
            <div class="contacts-map__service">
              <div class="service-body">
                <h4 class="service-body__title">Контактная информация
                </h4>
                <div class="contact-main-block">
                  <iframe class="contact-main-block__map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d80519.9059721316!2d34.74417439445094!3d50.90064449797358!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x41290220fc73a461%3A0xdb74f6366b836c28!2z0KHRg9C80YssINCh0YPQvNGB0LrQsNGPINC-0LHQu9Cw0YHRgtGMLCA0MDAwMA!5e0!3m2!1sru!2sua!4v1511360728763" width="300" height="350" frameborder="0" style="border:0;" allowfullscreen="allowfullscreen">
                  </iframe>
                  <div class="contacts-main">
                    <div class="contacts-item">
                      <div class="contacts-item__name">Телефоны
                      </div><img class="contacts-item__icon ico-one" src="img/tel-ico.png" alt="" role="presentation"/><span class="contacts-item__value">+ 38(099)-489-91-34</span>
                      <BR></BR><span class="contacts-item__value two">+ 38(099)-704-37-58</span>
                    </div>
                    <div class="contacts-item">
                      <div class="contacts-item__name">График роботы
                      </div><img class="contacts-item__icon ico-two" src="img/clock.png" alt="" role="presentation"/><span class="contacts-item__value">Пн-Пт с 9:00 до 15:00</span>
                    </div>
                    <div class="contacts-item">
                      <div class="contacts-item__name">Адрес
                      </div><img class="contacts-item__icon ico-two" src="img/mark-ico.png" alt="" role="presentation"/><span class="contacts-item__value">Семинарская 7, кабинет 21</span>
                    </div>
                    <div class="contacts-item">
                      <div class="contacts-item__name">Электронная почта
                      </div><img class="contacts-item__icon ico-two" src="img/envelope-ico.png" alt="" role="presentation"/><span class="contacts-item__value">urologinod@gmail.com</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          @include('layouts.enroll-form')

        </div>
      </div>

      @include('layouts.sidebar')
      
    </div>
  </section>
@endsection