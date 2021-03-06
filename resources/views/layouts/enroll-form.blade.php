<div class="doctor-form">
  <form class="form-body" method="POST" id="enrollFrom" action="{{ url('/enroll') }}" style="position: relative;">
    {{ csrf_field() }}
    <div class="form-body__title">Приходите на приём</div>
    <input class="form-body__field" name="patient_name" placeholder="Ваше Ф.И.О.*" type="text" value="{{ old('patient_name') }}" />
    <input class="form-body__field" name="patient_phone" placeholder="Телефон*" type="text" value="{{ old('patient_phone') }}"/>
    <input class="form-body__field" name="patient_email" placeholder="e-mail*" type="text" value="{{ old('patient_email') }}"/>
    <input class="form-body__field" id="datetimepicker" name="patient_visit_date" readonly placeholder="Дата*" type="text" value="{{ old('patient_visit_date') }}"/>
    <textarea class="form-body__field" name="patient_complaints" rows="5" placeholder="Суть проблемы">{{ old('patient_complaints') }}</textarea>
    <p class="form-body__text">Удостоверьтесь что данные указаны верно</p>
    <input class="form-body__write-btn" type="submit" value="Записаться"/>
  </form>
</div>
