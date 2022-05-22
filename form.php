<html>
  <head>
  <meta charset="utf-8" />
  <title>Форма</title>
  <link rel="stylesheet" href="style.css">
    <style>

.error {
  border: 2px solid red;
}
    </style>
  </head>
  <body>

<?php
if (!empty($messages)) {
  print('<div id="messages">');
  // Выводим все сообщения.
  foreach ($messages as $message) {
    print($message);
  }
  print('</div>');
}

// Далее выводим форму отмечая элементы с ошибками классом error
// и задавая начальные значения элементов ранее сохраненными.
?>

  <header>
        <div id="sect">
            <div id="h1">
                <h1>Заполните данные</h1>
            </div>
        </div>
    </header>
    <main>
    
        <div id="content3">
        <section id="form">
                <h2>Форма</h2>
                <form action=""  method="POST">
              <label>
                  Имя:<br />
                  <input name="name" <?php if ($errors['name']) {print 'class="error"';} ?> <?php if ($errors2['name']) {print 'class="error"';} ?>
                         value="<?php print $values['name']; ?>" />
              </label><br />
      
               <label>
                  email:<br />
                  <input name="email" <?php if ($errors['email']) {print 'class="error"';} ?> <?php if ($errors2['email']) {print 'class="error"';} ?>
                         value="<?php print $values['email']; ?>"
                         type="email" />
              </label><br />
      
              <select id="year" name="year">
                <?php for ($year = 1920; $year <= 2022; $year++) { ?>
                <option <?php if ($year == $values['year']) {print('selected="selected"');} ?> value="<?php print($year); ?>"><?php print($year); ?></option>
                <?php } ?>
              </select> <br />

      
              Пол:<br />
              <label>
                  <input type="radio" 
                         name="radio-group-1"
                         value="male"
                         <?php if($values['radio-group-1']=="male") {print 'checked';} ?> />
                  Муж
              </label>
              <label>
                  <input type="radio" 
                         name="radio-group-1" 
                         value="female" 
                         <?php if($values['radio-group-1']=="female") {print 'checked';} ?>/>
                  Жен
              </label><br />
      
              Количество конечностей:<br />
              <label>
                  <input type="radio" 
                         name="radio-group-2" 
                         value="1" 
                         <?php if($values['radio-group-2']=="1") {print 'checked';} ?> />
                  1
              </label>
              <label>
                  <input type="radio"
                         name="radio-group-2"
                         value="2" 
                         <?php if($values['radio-group-2']=="2") {print 'checked';} ?> />
                  2
              </label>
              <label>
                  <input type="radio"
                         name="radio-group-2" 
                         value="3"
                         <?php if($values['radio-group-2']=="3") {print 'checked';} ?>/>
                  3
              </label>
              <label>
                  <input type="radio"
                         name="radio-group-2"  
                         value="4" 
                         <?php if($values['radio-group-2']=="4") {print 'checked';} ?> />
                  4
              </label><br />
      
              <label>
                  Сверхспособности:
                  <br />
                  <select name="super"
                      multiple="multiple">
                      <option value="Immortality" <?php if($values['super']=="Immortality"){print 'selected';} ?> >Бессмертие</option>
                      <option value="Passing through walls" <?php if($values['super']=="Passing through walls"){print 'selected';} ?> >Прохождение сквозь стены</option>
                      <option value="Levitation" <?php if($values['super']=="Levitation"){print 'selected';} ?> >Левитация</option>
                  </select>
              </label><br />
      
              <label>
                  Биография:<br />
                  <textarea name="bio">
                  <?php print $values['bio']; ?></textarea> 
              </label><br />
      
      
              Чекбокс:<br />
              <label>
                  <input type="checkbox"
                         name="check" value="Yes"
                         <?php if($values['check']==TRUE){print 'checked';} ?> />
                  С контрактом ознакомлен
              </label><br />
                 <input type="hidden" name="csrf" value="<?php print $token; ?>">
      
              Отправить данные:
              <input type="submit" value="Отправить" />
          </form>
        </section>
        </div>
    </main>
</body>
</html>
