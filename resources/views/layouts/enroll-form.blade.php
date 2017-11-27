<div class="doctor-form">
  <form class="form-body" method="POST" action="{{ url('/enroll') }}">
    {{ csrf_field() }}
    <div class="form-body__title">Приходите на приём</div>
    <input class="form-body__field" name="patient_name" placeholder="Ваше Ф.И.О.*" type="text"/>
    <input class="form-body__field" name="patient_phone" placeholder="Телефон*" type="text"/>
    <input class="form-body__field" name="patient_email" placeholder="e-mail*" type="text"/>
    <input class="form-body__field" id="datepicker" name="patient_visit_date" placeholder="Дата*" type="text"/>
    <input class="form-body__field" name="patient_visit_time" placeholder="Время*" type="text"/>
    <textarea class="form-body__field" name="patient_complaints" rows="5" placeholder="Суть проблемы"></textarea>
    <p class="form-body__text">Удостоверьтесь что данные указаны верно</p>
    <input class="form-body__write-btn" type="submit" value="Записаться"/>
  </form>
</div>