@extends('layouts.master')

@section('title')
  <title>Врач-уролог Брезицкий Юрий Иосифович</title>
@endsection

@section('content')
  <section class="diseases">
        <div class="container">
          <div class="main">
            
            @include('layouts.question-list')
            
            <div class="main-info">
              <div class="main-info__left-part">
                <div class="methods-list">
                  <div class="methods-list__methods">
                    <div class="methods-body">
                      <div class="method">
                        <h4 class="method__title title-single">Эректильная дисфункция (устаревший термин - импотенция)</h4>

                        <p class="method__text ">Эректильная дисфункция - это патологическое состояние, при котором мужчина не может добиться эрекции достаточной для проведения нормального полового акта. Для того, чтобы понять, какие причины вызывают нарушение эрекции, необходимо понимать, каким образом она происходит. Знание механизмов эрекции дает ответ на причины нарушений, приводящие к неудачам.

                        <p class="method__inner-title">Механизмы эрекции:</p>
                        <p class="method__text">За счет зрительных, обонятельных, тактильных раздражителей возбуждаются центры в центральной нервной системе, из которых посылаются сигналы в чувствительные окончания, находящиеся в сосудах полового члена. Происходит расширение артерий в половом члене. Расширенные артерии сдавливают вены, по которым осуществляется отток крови из пещеристых тел. Таким образом, по расширенным артериям под давлением нагнетается кровь,- в это время по сдавленным артериями венам отток крови почти прекращается - происходит заполнение кровью пещеристых тел и наступает эрекция. Пещеристые тела состоят из массы пузырьков- пещер. Этих камер в половом члене очень много. Накачанные кровью под давлением камеры – пузырьки увеличиваются в размерах и обеспечивают твердую эрекцию. Поэтому повреждение сосудов, их несостоятельность признана ведущей причиной, приводящей к эректильной дисфункции. Большое значение имеет и состояние нервной системы. При нарушениях со стороны нервной системы может происходить недостаточное возбуждение центров в головном мозге и нарушение передачи импульсов возбуждения к рецепторам сосудов полового члена. Кроме того, в головном мозге выделяются рилизинг - гормоны, которые регулируют (руководят) синтезом гормонов в железах эндокринной системы. Функция эндокринной системы определяет взаимодействие различных гормонов. Только нормально функционирующая эндокринная система может обеспечить либидо (половое влечение) и достаточную эрекцию. Большое значение имеет не только количество гормонов, но и соотношение их между собой.</p>

                        <p class="method__text ">Известно, что жировые клетки способствуют повышению синтеза женских половых гормонов, это приводит к нарушению соотношения гормонов и угнетению полового влечения и эрекции. К нарушению потенции может приводить прием ряда лекарственных препаратов, особенно тех, которые направлены на снижение уровня холестерина. Считаю, что более естественно снижать холестерин, используя диету и повышая двигательную активность. Длительность и интенсивность лечения эректильной дисфункции зависит от степени выраженности проявлений. Для оценки степени Э.Д. сущесвуют специальные опросники. Наиболее распространен и удобен международный Индекс Эректильной Дисфункции (МИЭФ). Он переведен более чем на 35 языков. Для определения Вашего индекса необходимо заполнить следующие графы. Это помогает врачу более точно и быстро определить степень заболевания.</p>

                        <p class="method__inner-title">Есть ли у вас эректильная дисфункция? Шкала степени выраженности эректильной дисфункции «Международный индекс» эректильной функции, МИЭФ-5</p>

                        <p class="method__text ">1) Как часто у Вас возникала эрекция при сексуальной активности за последнее время?</p>
                        <ol class="reason-list method__text">
                          <li>Почти никогда или никогда / Чрезвычайно трудно - 1</li> 
                          <li>Редко (реже чем в половине случаев) / Очень трудно - 2</li>  
                          <li>Иногда (примерно в половине случаев) / Трудно - 3</li>  
                          <li>Часто (более чем в половине случаев) / Не очень трудно - 4</li>  
                          <li>Почти всегда или всегда / Не трудно - 5</li>  
                        </ol>

                        <p class="method__text ">2) Как часто за последнее время возникающая у Вас эрекция была достаточна для введения полового члена (для начала полового акта)? </p>
                        <ol class="reason-list method__text">
                          <li>Почти никогда или никогда - 1</li> 
                          <li>Редко (реже чем в половине случаев) - 2</li>  
                          <li>Иногда (примерно в половине случаев) - 3</li>  
                          <li>Часто (более чем в половине случаев) - 4</li>  
                          <li>Почти всегда или всегда - 5</li>  
                        </ol>

                        <p class="method__text ">3) При попытке полового акта как часто у Вас получалось осуществить введение полового члена (начать половой акт)?  </p>
                        <ol class="reason-list method__text">
                          <li>Почти никогда или никогда - 1</li> 
                          <li>Редко (реже чем в половине случаев) - 2</li>  
                          <li>Иногда (примерно в половине случаев) - 3</li>  
                          <li>Часто (более чем в половине случаев) - 4</li>  
                          <li>Почти всегда или всегда - 5</li>  
                        </ol>

                        <p class="method__text ">4) Как часто за последнее время Вам удавалось сохранить эрекцию после начала полового акта?  </p>
                        <ol class="reason-list method__text">
                          <li>Почти никогда или никогда - 1</li> 
                          <li>Редко (реже чем в половине случаев) - 2</li>  
                          <li>Иногда (примерно в половине случаев) - 3</li>  
                          <li>Часто (более чем в половине случаев) - 4</li>  
                          <li>Почти всегда или всегда - 5</li>  
                        </ol>

                        <p class="method__text ">5) Насколько трудным было сохранить эрекцию в течение и до конца полового акта?  </p>
                        <ol class="reason-list method__text">
                          <li>Почти никогда или никогда - 1</li> 
                          <li>Редко (реже чем в половине случаев) - 2</li>  
                          <li>Иногда (примерно в половине случаев) - 3</li>  
                          <li>Часто (более чем в половине случаев) - 4</li>  
                          <li>Почти всегда или всегда - 5</li>  
                        </ol>

                        <p class="method__text">Подсчитайте количество баллов</p>

                        <p class="method__inner-title">Результаты тестирования</p>

                        <ol class="reason-list method__text">
                          <li>21-25 баллов — Норма или отсутствие ЭД </li> 
                          <li>16-20 баллов — Легкая ЭД </li>  
                          <li>11-15 баллов — Умеренная ЭД</li>  
                          <li>5-10 баллов — Значительная ЭД</li>  
                        </ol>

                        <p class="method__text">Если вы обнаружили у себя эректильную дисфункцию, не занимайтесь самолечением, обратитесь к специалисту.</p>

                        <p class="method__inner-title">Лечение эректильной дисфункции</p>
                        <p class="method__text">
                          Выяснив причину нарушения, определяем тактику терапевтических мероприятий. Терапия включает воздействие на системы организма, принимающие участие в механизме эрекции.
                        </p>

                        <p class="method__text">
                          Диета занимает одно из ведущих мест в терапии эректильной дисфункции. Клетки жировой ткани синтезируют женские половые гормоны. Большое количество женских половых гормонов угнетает половое влечение и приводит к ухудшению эрекции. При избыточном весе рекомендуется его снизить. Из пищи исключают продукты, содержащие жиры и углеводы и повышают потребление продуктов с большим содержанием белков. Включают продукты, содержащие в большом количестве цинк – крольчатина, лимоны, мед, яблоки, груши, неочищенный рис, инжир, черная смородина, молоко, ячменная и овсяная крупы, говяжья печень, тыквенные и арбузные семечки, проросшая пшеница. Способствуют улучшению эрекции морепродукты – рыба жирных пород, кальмары, мидии, устрицы. Необходимо включить в рацион козье молоко, пивные дрожжи, сельдерей, морковь, капусту. Важно знать, что неправильное, богатое жирами и углеводами питание, является одной из ведущих причин нарушения потенции.
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="main-info__middle-part">
                <div class="methods-list two-text">
                  <div class="methods-list__methods">
                    <div class="methods-body">
                      <div class="method">
                        <p class="method__text no-ital">
                          Медикаментозная терапия должна быть направлена на улучшение кровообращения в целом и в сосудах полового члена в частности, поэтому назначаются ангиопротекторы. Для восстановления функции нервной системы назначаются препараты нейротропного характера и препараты, улучшающие обмен веществ.
                        </p>
                        <p class="method__text">
                          При нарушении гормонального статуса назначаются средства, влияющие на синтез гормонов, или проводится заместительная гормонотерапия. Большое значение уделяем организации правильного режима двигательной активности, подбору специфических упражнений лечебной физкультуры. Не пренебрегаю и опытом народной медицины.
                        </p>
                        <p class="method__text">Хорошо зарекомендовали себя следующие простые рецепты, которые использовали народные целители.</p>

                        <ol class="reason-list method__text">
                          <li>1)  20 гр измельченных сухофруктов (инжир, чернослив, изюм, груша) в равных пропорциях смешать с 15 ядрами грецкого ореха, принимать по 1ст.л. в день до улучшения потенции.</li> 
                          <li>2)  В эмалированную, керамическую или стеклянную посуду с вечера залить 0,5л. холодной воды + 4г. коры можжевельника. Утром поставить на огонь и довести до кипения, кипятить на очень слабом огне 15мин., процедить. Пить по 100мл 4 раза в день до улучшения состояния. Это средство не показано при пиелонефрите с нарушенной функцией.</li>  
                          <li>3)  Чтобы избежать импотенции, мужчинам следует спать девять-десять часов в сутки, обязательно посещать парную, принимать солнечные ванны. Кроме этого, необходимо ежегодно проводить два небольших (от трех до шести дней) и одно длительное (от 25 до 30 дней) голодания. Надо отказаться от курения, спиртного, кофе и чая. Два раза в день есть салаты из сырых овощей. В них обязательно должны присутствовать морковь, репа или свекла. Всем, страдающим импотенцией, необходимо пользоваться расширителями ануса. Комплект можно приобрести в аптеке. Из четырех расширителей следует вставить в анус сначала самый маленький, а потом ставить все больше и больше. Потенция восстановится.</li>  
                          <li>4)  В комплекс включаем препараты растительного происхождения традиционно используемые в народной медицине: настойка женьшеня, настойка заманихи , настойка золотого корня, элеутерококка, аралии маньчжурской, лимонника китайского, заманихи, яньшень-хубао, пантокрин, препараты из йохимбо, трибестан.</li>  
                        </ol>  

                        <p class="method__text">Очень важно знать, что только сочетание различных методов, назначенных специалистом с учетом подробного исследования больного, позволяет добиться хороших результатов. При этом лечение не может быть назначено по шаблону. Что у одного больного привело к очень хорошим результатам - другому пациенту может навредить. Так если больному со сниженным содержанием тестостерона назначать антибактериальную терапию, улучшения не будет. Назначение гормоностимулирующей терапии в том случае ,если причина нарушений связанна с воспалением ,приведет к неудаче.</p>   

                        <p class="method__text">Приведу два примера из своей практики. Больной Борис. Возраст 24 года, обратился с жалобами на ухудшение эрекции и снижение полового влечения. До посещения нашего кабинета проходил лечение в другом месте. Там был проведен комплекс исследований. Результаты показали нормальный уровень тестостерона. На основании этого лечащим врачом было сделано ошибочное заключение, что причина не в нарушении уровня тестостерона. Назначенная терапия закончилась неудачей. Больной обратился к нам. Обследование на содержание тестостерона было дополнено исследованием крови на содержание общего тестостерона, свободного тестостерона, уровня секс связывающего гамма-глобулина. Оказалось, что у этого больного, несмотря на достаточно высокий уровень общего тестостерона, снижено содержание свободного тестостерона за счет секс - связывающего гамма-глобулина. Известно, что секс связывающий гамма-глобулин связывается с тестостероном, а связанный тестостерон неактивен. В связи с этими обстоятельствами были внесены коррективы в терапию. В течении месяца восстановилось половое влечение и нормализовалась эрекция. Дальнейшее наблюдение подтвердило устойчивость эффекта от лечения. Больной выполняет рекомендации в отношении диеты, режима двигательной активности, чередования труда и отдыха.</p>

                        <p class="method__text">Другой случай. Больной Максим обратился с жалобами на периодически появляющиеся незначительные боли в области промежности, ускоренное семяизвержение, вялую эрекцию. До посещения нашего кабинета проходил лечение методом массажа предстательной железы. Результаты исследования: повышение содержания лейкоцитов в секрете предстательной железы. Это дало основание говорить о простатите, как причине ускоренного извержения и снижения эрекции. Исследование секрета методом бакпосева , ПЦР, ИФА определило что возбудителем является хламидия. После антибактериальной терапии с учетом возбудителя , в сочетании с препаратами, улучшающими эрекцию и препаратами, позволяющими продлить половой акт, сексуальная функция у этого больного нормализовалась.</p> 

                        <p class="method__text">Терапевтические мероприятия всегда стараюсь обосновывать целым рядом исследований. Разным больным может быть назначен разный комплекс исследований. Только индивидуальный подход может привести к удовлетворительным результатам. Лечение в нашей клинике комплексное, с использованием медикаментов, препаратов из трав, индивидуального подбора диеты, режима двигательной активности, упражнений лечебно-физкультурного комплекса. Возможности физиотерапевтического отделения позволяют проводить самые современные методы лечения с использованием магнито-лазеро-ультразвуковой терапии, электролечение, светолечение, электросонотерапия, пелоидотерапия. При необходимости используем озонирование крови, плазмаферез, гемасорбцию. Это не значит, что всем больным назначается полный комплекс диагностических процедур. Разным больным назначаются разные процедуры. Комплексная терапия помогает нам снизить количество медикаментов и улучшить результат. Уменьшение доз и длительности медикаментозной терапии позволяет избежать развития побочных эффектов.</p> 

                        <p class="method__text">Главные принципы нашей работы: конфиденциальность (неразглашение врачебной тайны), доброжелательное отношение к больным, доступность. Консультация врача, диагностика сифилиса, ВИЧ-СПИДА проводится бесплатно.</p>     

                        <p class="method__text">При возникновении вопросов звоните по телефону: (048) 711-65-01. График приема: пн - пт с 9:00 до 15:00.</p>          
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="main-info__right-part">
                
                @include('layouts.enroll-form')

              </div>
            </div>
          </div>
          
      @include('layouts.sidebar')

        </div>
      </section>
@endsection
