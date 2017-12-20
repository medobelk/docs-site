@extends('layouts.master')

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
                        <h4 class="method__title title-single">Цистит (воспаление мочевого пузыря)</h4>

                        <p class="method__text ">Цистит - воспаление мочевого пузыря, с преимущественным поражением слизистой оболочки. Это самое частое заболевание в практике поликлинического уролога, а по частоте среди всех заболеваний занимает второе место, уступая только насморку и воспалению носоглотки.

                        <p class="method__inner-title">Причины возникновения заболевания</p>
                        <p class="method__text">Причин вызывающих это заболевание так много, что перечисление их может быть утомительным для непроффесионалов. Назову основные: микроорганизмы ( вирусы, их много, бактерии, так же могут быть различными, простейшие чаще трихомонады, грибы - тоже разные). Одной из причин может быть аллергия стенки мочевого пузыря на какое нибудь вещество, аллергия так же может быть на микроорганизм, в более редких случая цистит вызывается химическим ожогом, или ожогом полученным в результате облучения при лучевой терапии.
                        Чаще всего циститом болеют женщины молодого возраста. Среди микроорганизмов в 60% случаев цистит вызывает кишечная палочка. В норме у здоровой женщины мочевой пузырь имеет очень мощную защиту. Если здоровой женщине в пузырь попадает какой ни будь вредный микроорганизм, она не заболеет. К сожалению здоровых людей сейчас практически нет. Защита мочевого пузыря определяется состоянием слизистой самого пузыря, шейки матки, слизистой влагалища.Так слизистая пузыря выделяет желеобразное вещество - муцин которое при пропадании в пузырь "микроба" обволакивает его как холодец а затем этот сгусток удаляется при мочеиспускании.Количество и качество этого "холодца" определяется качеством кровообращения в мочевом пузыре. Больше крови притекает к пузырю больше будет выделено муцина. Сосуды которые питают стенку пузыря располагаются, если рассматривать пузырь изнутри, поверхностно, поэтому когда в мочевом пузыре много мочи , (не вовремя опорожняется пузырь), сдавливаются сосуды нарушается приток крови, снижается образование муцина, бактериям легче прилипнуть к стенке пузыря.</p>
                        <p class="method__text">Причинами, вызывающими нарушение циркуляции крови в пузыре, могут быть: </p>
						<ol class="reason-list method__text">
						  <li>1) переохлаждение</li>
                          <li>2) прием спиртных напитков</li>
                          <li>3) сидячий образ жизни</li>
                          <li>4) когда половой акт не заканчивается оргазмом.</li>
						</ol>
						<p class="method__text">
                          Слизистая шейки матки выделяет защитные иммуноглобулины при ее поражении уменьшается их количество, что снижает иммунную защиту пузыря и женских половых органов.Во влагалище живут разные микроорганизмы: в норме там есть и вредные, которые могут вызывать заболевание, однако, когда у них есть конкуренты в виде полезных( кисломолочные бактерии, палочки Дедерлейнера и т.д), воспаления не наступает . При поражении этой конкурентной флоры вредные микрорганизмы развиваются , что приводит к возникновению воспаления.
                        <p class="method__inner-title">К нарушениям микрофлоры приводит:</p>
						<p class="method__text">
                          пища содержащая пищевые добавки и консерванты, антибиотикотерапия, и даже гигиена половых органов ( если женщина часто спринцуется, то вымывает микрофлору).
                          Одной из причин которые способствуют развитию цистита является разрыв девственной плевы.Так называемый цистит первой брачной ночи.В этом случае большую роль играет предшествующее повреждение микрофлоры влагалища или бактерии которые находятся на половом члене партнера. Микроорганизмы попадают в ранки после дефлорации и распространяются на слизистую мочеиспускательного канала и мочевого пузыря.После разрыва девственной плевы могут образовываться спайки между наружным отверстием мочеиспускательного канала и остатками девственной плевы. Эти спайки подтягивают наружное отверстие канала внутрь влагалища.При последующих половых актах происходит микротравма наружного отверстия и втирание микроорганизмов в слизистую оболочку. Сужение наружного отверстия мочеиспускательного канала зачастую играет ведущую роль в развитие болезни. Если канал сужен, а у женщины наружное отверстие как правило шире, струя мочи при мочеиспускании, в пристеночных частях, ударяется о препятствие и забрасывается обратно внутрь пузыря вместе с микроорганизмами которые находится в наружной части канала, где даже в норме у здоровой женщины живут микроорганизмы способные вызвать воспаление. <em>Одной из ведущих причин роста заболеваемости является нношение стрингов.</em> Я всегда говорю, что попа должна быть в трусах, а не наоборот. Стринги впиваются в аногенитальную складку и являются проводником между задним проходом и половыми органами. Свобода половых отношений приводит к обмену между партнерами бактериями устойчивыми к лечению.По этому в природе происходит накопление тех организмов которые трудно поддаются воздействию антибиотиков.
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
                        <p class="method__inner-title">Симптомы цистита</p>
						<p class="method__text">
							Жжение рези, боль при мочеиспускании, постоянные позывы, ощущение тяжести и боли внизу живота, зуд в области наружного отверстия мочеиспускательного канала. Симптомы могут отличаться и по тяжести и по самим проявлениям, в зависимости от: области, глубины поражения, возбудителя вызвавшего это поражения, состояния иммунитета и наконец индивидуальной реакции больной.
                        </p>
                        <p class="method__inner-title">Чем опасен цистит</p>
						<p class="method__text">
							Если лечение не соответствует тяжести или микроорганизм устойчив к терапии, воспаление распространяется на почки. Что значительно хуже. Осложнение цистита воспалением почек может протекать бессимптомно, но чаще об осложнении говорит повышение температуры тела, появление боли в пояснице.С чем можно спутать цистит? При мочекаменной болезни, когда камень проходит через нижнюю часть мочеточника - появляются сильные боли в мочевом пузыре, частые позывы к мочеиспусканию, боли отдающие вниз живота или половую губу как на стороне поражения так и с противоположной стороны.При онкопатологии когда в мочевыводящие пути поступает кровь или сгусток гноя которые могут перекрывать мочевыводящие пути, и наконец при раке мочевого пузыря.
                        </p>
                        <p class="method__text">
                        </p>
						<p class="method__inner-title">Лечение цистита</p>
                        <p class="method__text">
							Каким методом лечить цистит в конкретном случае должен решать врач вместе с больным. Учитывается как долго тянется заболевание, на сколько плохи анализы мочи, какой возбудитель, на фоне каких заболеваний протекает данное заболевание. Приведу пример , больная Н страдала циститом несколько лет. Обычно в мазках выделяли молочницу. Которую лечили всеми самыми дорогими противогрибковыми препаратами. После более детального опороса и обследования выяснилось, что у нашей больной высокий сахар крови. У таких больных пока не будут приведены показатели сахара крови, молочницу вылечить невозможно. У другой больной цистит обострялся около 10 лет, обострение происходило как правило после полового акта, Во время тщательного осмотра в кресле выяснилось, что у данной больной образовалась спайка между наружным отверстием канала и остатками девственной плевы. После рассечения этой спайки больная была пролечена, наблюдалась нами 5лет обострений не было. Бывают женщины с так называемым лимфоидным строением слизистой ( унаследуется то родителей как цвет глаз) их около 3%. С таким строением женщина обречена страдать циститом. Таким больным очень хорошо помогают заливания в мочевой пузырь озонированной дистиллированной воды ( тут главное не переборщить). В любом случае, при появлении симптомов необходимо обратиться к специалисту, который вам поможет избавиться от недуга. Очень важно знать, что лечение даже с помощью врача может не принести быстрого улучшения иногда приходится менять тактику, препараты и методы уже по ходу лечения. Нужно помнить: соблюдение диеты всегда должно находиться на первом месте при лечении любого воспаления, а тем более воспалении мочевого пузыря. При нарушении диеты, с мочей начинают выделяться раздражающие вещества и что бы вам ни назначили, толку не будет. </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="main-info__right-part">
                
                @include('layouts.question-form')

              </div>
            </div>
          </div>
          
		  @include('layouts.sidebar')

        </div>
      </section>
@endsection