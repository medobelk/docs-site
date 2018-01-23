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
                        <h4 class="method__title title-single">Пиелонефрит</h4>
                        <p class="method__text ">
                            Пиелонефрит - это воспаление почек: чашечек, лоханок, тканей почек. Пиелонефрит чаще всего вызывают микроорганизмы; это могут быть бактерии, вирусы, грибы, простейшие. Реже причиной воспаления являются различные глисты. Пиелонефрит - большая социальная и экономическая проблема. Социальное значение определяется большой распространенностью данного заболевания. По частоте обратившихся на прием к врачу с заболеваниями, пиелонефрит находится на втором месте. Он уступает только острым респираторным заболеваниям и циститу. Женщины страдают пиелонефритом значительно чаще, чем мужчины. На 10000 женщин приходится около 12 госпитализаций, в то время как на 10000 мужчин только 2,4. Почему у женщин пиелонефрит развивается чаще? Это обусловлено анатомо-физиологическими особенностями женского организма, наличием воспалительных заболеваний придатков матки, короткой уретры, близостью ее к влагалищу и заднему проходу, что способствует распространению инфекции.
                        </p>
                        
                        <p class="method__inner-title">Острый пиелонефрит</p>

                        <p class="method__text">В случаях, когда заболевание развивается в совершенно здоровой ничем не скомпрометированной почке, пиелонефрит называют первичным. В этом случае основным путем попадения микроорганизма вызывающего воспаление является гематогенный занос. Как правило, гематогенный занос случается как осложнение воспалительных заболеваний в других органах. Например, когда попавший в кровь микроорганизм, вызвавший ангину, мигрируя по кровяному руслу, оседает в тканях почки. Возникшее в таком случае воспаление почки считается осложнением ангины. Аналогичные осложнения могут быть и при других простудах. Кроме того, при первичном пиелонефрите инфекция в почку может проникать по лимфатической системе из окружающих почку органов. Чаще всего - из внутренних женских половых органов. В случае проникновения инфекции снизу, из мочеиспускательного канала, вначале в мочевой пузырь, а затем в почку говорят о ретроградном пути инфекции. 
                        В свою очередь, различают серозный первичный пиелонефрит и его гнойные формы. К гнойным формам относятся: апостематоз, карбункул, абсцесс, некротический папиллит. Самым легким поражением среди гнойных пиелонефритов является апостематоз. При апостематозе почка покрывается мелкими гнойничками, напоминающими просяные зерна. Для лечения гнойных форм необходимо хирургическое вмешательство, без которого больной может потерять функцию почек и в итоге погибнуть. Вот почему так важно бывает вовремя госпитализировать больного с острым пиелонефритом.</p>

                        <p class="method__inner-title">Хронический пиелонефрит</p>

                        <p class="method__text">Хронический пиелонефрит чаще всего бывает вторичным. Ведущим фактором в развитии заболевания является нарушение оттока мочи. К нарушению оттока мочи приводит ряд причин: врожденные аномалии развития мочевыводящей системы, опущение почки, сужение мочеточника, повреждение нервов идущих к мышцам, отвечающим за продвижение мочи, повреждение самих этих мышц. Ведущими причинами нарушения уродинамики являются мочекаменная болезнь, аденома простаты. При хроническом вторичном пиелонефрите инфекция может попадать из мочеиспускательного канала в мочевой пузырь и далее в почку.</p>

                        <p class="method__text">При хроническом пиелонефрите различают: фазу обострения, фазу ремиссии, фазу латентного воспаления. 
                        Латентне или скрытое воспаление - такое воспаление почек, при котором не удается добиться нормализации клинико-лабораторных показателей. Скрытое течение пиелонефрита приводит к нефросклерозу – гибели почки.</p>

                        
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
                        <p class="method__inner-title">Симптомы пиелонефрита</p>

                        <ol class="reason-list method__text">
                          <li>1) Боль в области почек (поясница, живот в подреберной области справа или слева, боль может отдавать, вниз имитируя приступ аппендицита).</li>
                          <li>2) Боль при пиелонефрите может усиливаться при вдохе. Почти в половине случаев больные жалуются на боли при мочеиспускании. При особенно остром пиелонефрите температура тела может повышаться до 40 градусов и выше.</li>
                          <li>3) Часто болезнь приводит к общему отравлению организма, проявляющемуся снижением аппетита, тошнотой, рвотой, слабостью, головокружением.</li>
                        </ol>

                        <p class="method__text">При обострении хронического пиелонефрита проявления могут быть невыраженными, скрытыми настолько, что больной не обращает внимания. Одним из основных критериев для постановки диагноза являются лабораторные методы исследования.<br>Если вы подозреваете у себя наличие пиелонефрита, не занимайтесь самолечением во избежание усугубления ситуации, обратитесь к специалисту.</p>

                        <p class="method__inner-title">Диагностика пиелонефрита</p>

                        <p class="method__text">Диагностика строится на основании истории развития данного заболевания, анализа опроса больного, детального осмотра, пальпации, простукивания. Важнейшими факторами для диагностики являются данные лабораторных исследований, которые в каждом конкретном случае подбираются индивидуально: ультрасонография, выделительная урография, радиоизотопная ренография, сцинтиграфия, компьютерная томография, магниторезонансная томография.</p>

                        <p class="method__inner-title">Лечение пиелонефрита</p>

                        <p class="method__text">Интенсивность терапии зависит от выраженности и формы заболевания. Острый пиелонефрит желательно лечить в специализированных стационарах. Назначения зависят от тяжести заболевания, степени изменения лабораторных показаний, данных дополнительных исследований. 
                        На первом мете при лечении пиелонефрита стоит диета. Необходимо исключить острое, соленое, горькое, кислое, пряное, жареное, кофе, шоколад, спиртное. В зависимости то данных лабораторных исследований врач назначает антибактериальную терапию. Большое значение в терапии пиелонефрита занимает лечение препаратами из трав. В нашем кабинете для лечения пиелонефрита используется комплексный подход: медикаментозная терапия сочетается с широким диапазоном фитотерапевтических процедур (магнитолазерная терапия, электротерапия, ультразвуковая терапия.) Широко используются такие методы как плазмаферез, озонотерапия, гирудотерапия. Такой подход позволяет значительно снизить медикаментозную нагрузку на больного, что позволяет избежать развития побочных эффектов, и добиться лучших результатов.</p>

                        <p class="method__inner-title">Профилактика пиелонефрита</p>

                        <p class="method__text">Основой профилактики является здоровый образ жизни. Без этого никакие методы не будут давать результатов. Необходимо организовать нормальный режим двигательной активности. Правильная диета (лечебное питание) занимает ведущее место в профилактике этого заболевания. Важно восстановить бактериальный фон кишечника и влагалища. Необходимо подбирать диету таким образом, чтобы не было запоров. Важно убрать очаги инфекции в других органах. Витаминотерапия помогает сохранить защитные функции организма. Большое значение имеет нормализация иммунитета. Для нормализации иммунитета используются пробиотики, эубиотики, протефлазит, деринат, метилурацил и т.д. Самолечение может привести к прогрессированию заболевания, поэтому не рискуйте и доверьте свое здоровье специалисту. </p>

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
