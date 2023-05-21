<?php
session_start();?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>index</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
      <nav class="navbar navbar-expand-lg  navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><img src="img/newwwwwww.png" alt=""></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav m-auto">
                 
                  <li class="nav-item">
                    <a class="nav-link" href="contact-us.php">اتصل بنا</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="projects.php">باقات التشطيب</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="jops.php">اعمالنا</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " href="services.php">الخدمات</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="index.php">الصفحه الرئيسيه</a>
                  </li>
                </ul>
                <?php if (isset($_SESSION['user_id'])): ?>
<span>مرحبًا، <?php echo $_SESSION['user_name']; ?></span>
<a href="logout.php"><button id="user" class="btn btn-secondary button">تسجيل الخروج</button></a>
<?php else: ?>
<a href="Admin.php"><button id="user" class="btn btn-secondary button">تسجيل الدخول</button></a>
<?php endif; ?>
              </div>
            </div>
          </nav>
</header>

<main>
  <div class="service-top">
        <div id="photo-the-top">
            <h4>باقات التشطيب فى مصر</h4>
           </div>
    <div class="container">
        <div class="text-top">
            <h1>باقات التشطيب فى مصر</h1>
            <p>تقدم شركة ديكور مصر العديد من انظمة التشطيب فى مصر من خلال تقديم افضل اسعار التشطيب 2023 تناسب جميع الفئات السعريه. تسطيع معرفة تكلفة تشطيب فيلا فى مصر او شقه من خلال سعر متر التشطيب فى مصر الموضحه ادناه. نقدم لك تصميمات عصريه تناسب ذوقك الخاص واسعار منافسه بالنسبه لجوده التسليم والخامات المستخدمه فى التشطيب . ملتزمين بمواعيد التسليم المتفق عليها عند التعاقد وبالخامات الموجوده فى باقات التشطيب من خلال عقد ملزم بينا وبين العميل لحفظ حقوق الطرفين والتزام الشركه الخاصه بنا بتسليم الوحده كما بالتصميم الموافق عليه من قبل العميل </p>
        </div>
        <div class="text-top"><h1>باقة تشطيب لوكس</h1></div>

        <div class="row row-cols-3 ">
          <div class="col"> 
            <div class="img-services" id="SER-1">
                <img src="img/محاره.png" alt="">
                <h1>محارة وجبس</h1>
            </div>
           <div class="text-ser">
            <div class="poxs"></div>
            <h5> .محارة الموقع بالكامل بؤج واوتار تسليم هندسي متكامل واعلي جوده</h5>
           
            <div class="poxs"></div>
            <h5> تركيب اسلاك فواصل بين الجدران والاجزاء الخرصانية مراعاة لعوامل التمدد</h5>
           
            <div class="poxs"></div>
            <h5>دهارة اسقف الوحدة بالكامل بمادة كيمازيت من مواد البناء الحديث المقاوم الرطوبة</h5>
           
            <div class="poxs"></div>
            <h5>جبس امبورد لكامل الوحدة كناف الماني واسقف معلقة كما بالتصميم المتفق علية</h5>
           
            <div class="poxs"></div>
            <h5>مراعاة عند تركيب الجبسن بورد تركيب شاش فواصل ومعجون الممتاز وميتال للسكوك</h5>
           
            <div class="poxs"></div>
            <h5>جبسن بورد للحمام اخضر المقاوم للرطوبة وجبسن بورد احمر للمطبخ مقاوم للرطوبة والحرارة كناف الماني</h5>
           </div>
        </div>
          <div class="col">
            
            <div class="img-services"id="SER-1">
                <img src="img/سباكه.webp" alt="">
                <h1>السباكة</h1>
            </div>
           <div class="text-ser">
            <div class="poxs"></div>
            <h5>مواسير مياه اكوا ثيرم</h5>
           
            <div class="poxs"></div>
            <h5>الصرف حمزة وعمل مواسير صرف التكييفات سمارت 1 بوصة</h5>
           
            <div class="poxs"></div>
            <h5>صرف لبلاعات البلكونات وتأسيس مخارج فلتر ومخارج غسالة</h5>
           
            <div class="poxs"></div>
            <h5>تركيب خلاطات ايديال استنادرد للحمامات والمطبخ </h5>
           
            <div class="poxs"></div>
            <h5>تركيب احواض ديروفيت وقواعد دفن ايديال ستنادرد او سمارت حسب اختيار العميل</h5>
           
            <div class="poxs"></div>
            <h5>حله ستيل هاينز للمطبخ كوري</h5>
           
            <div class="poxs"></div>
            <h5>الاحواض بها تقفيلات رخام غاطس ويو بي في سي المقاوم للمياه</h5>
           
            <div class="poxs"></div>
            <h5> بانيو الطيب وكابينة شاور ان وجد مع عمل جلسة رخام داخل الكابين شاور حسب اختيار العميل.</h5>
           
            <div class="poxs"></div>
            <h5>تركيب سماعات دوش للحمامات</h5>
           </div>  

          </div>  
          <div class="col">
             
            <div class="img-services"id="SER-2">
                <img src="img/كهرباء.webp" alt="">
                <h1>الكهرباء</h1>
            </div>
           <div class="text-ser">
            <div class="poxs"></div>
            <h5>تأسيس جميع الاسلاك السويدي الأصلي</h5>
           
            <div class="poxs"></div>
            <h5>اسلاك 6 ملم للتكييفات والسخانات</h5>
           
            <div class="poxs"></div>
            <h5>علب ماجيك وخراطيم علاء الدين الاصلي</h5>
           
            <div class="poxs"></div>
            <h5>لوحة فينوس 24 خط</h5>
           
            <div class="poxs"></div>
            <h5>تأسيس وتركيب لوحة خدمات للراوتر والدش</h5>
           
            <div class="poxs"></div>
            <h5>تأسيس الجبسن بورد اسلاك 2 ملم للأسبوتات وتركيب سبوتات ليد السراج للجبسن بورد.</h5>
           
            <div class="poxs"></div>
            <h5>تركيب ليد دوبل لبيت النور الداخلي وعمل كشافات طوارىء لكامل الوحدة</h5>
           
            <div class="poxs"></div>
            <h5>  تركيب اوشاش صانش وفيش ومفاتيح كهرباء اسباني</h5>
           
            <div class="poxs"></div>
            <h5>وتغذية السخانات بسلك 6 ملم وسلك 3 ملم للغرف ومفاتيح التكييف شنايدر.</h5>
           </div>
           
          </div>

          <div class="col">
            <div class="img-services"id="SER-2">
                <img src="img/دهان.png" alt="">
                <h1>دهان وديكور</h1>
            </div>
           <div class="text-ser">
            <div class="poxs"></div>
            <h5>تجليخ الحوائط بحجر جلخ لازالة الرمال العالقه بالاسطح</h5>
           
            <div class="poxs"></div>
            <h5>دهان مادة سيلر مائى لتثبيت الاسطح</h5>
           
            <div class="poxs"></div>
            <h5>سحب 4 طبقات معجون وواجهين بطانه ووجهين تشطيب مع تأسيس الجبسن بورد جي ال سي</h5>
           
            <div class="poxs"></div>
            <h5>دهان جميع ابواب الوحده دوكو او بليستر كما يطلبه العميل مع مراعاة اكواد الالوان كما بالتصميم المتفق عليه</h5>
           
            <div class="poxs"></div>
            <h5>ورق حائط واعمال خشبية تجليد واستيل وبانوهات خشبيه كما بالتصميم</h5>
           </div>
           
          </div>
          
          <div class="col">
            <div class="img-services" id="SER-3">
                <img src="img/نجاره.png" alt="">
                <h1>نجارة والوميتال</h1>
            </div>
           <div class="text-ser">
            <div class="poxs"></div>
            <h5>الوميتال بي اس صغير سلك امريكي وكاوتش واكسسوار تركي</h5>
           
            <div class="poxs"></div>
            <h5>باب الشقة الرئيسي مصفح تركي</h5>
           
            <div class="poxs"></div>
            <h5>تركيب حلوق 2 بوصة للأبواب</h5>
           
            <div class="poxs"></div>
            <h5>عمل ابواب لكل الغرفة خشب سويد وقشرة ارو وكوالين ايطالي ومقابض تركيب</h5>
           
            <div class="poxs"></div>
            <h5>دهان الابواب دوكو فرن او بليستر او استر حسب اختيار العميل</h5>
           </div>
           
          </div>

          <div class="col">
            <div class="img-services"id="SER-3">
                <img src="img/بلاط.png" alt="">
                <h1>البلاط</h1>
            </div>
           <div class="text-ser">
            <div class="poxs"></div>
            <h5>عزل الحمام والمطبخ بمادة سيكا 107 من كيماويات البناء الحديث مع مراعاة عمل رقبة زجاجة</h5>
           
            <div class="poxs"></div>
            <h5>سيراميك كيلوباترا قطع ليزر لارضيات الغرف او باركيه سيراميك كليوباترا 15 * 70 فرز اول حسب اختيار العميل</h5>
           
            <div class="poxs"></div>
            <h5>حوائط حمامات ومطابخ كيلوباترا فرز اول</h5>
           
            <div class="poxs"></div>
            <h5>بورسالين كيلوباترا للريسيبشن والطرقة</h5>
           </div>
           
        </div>
     </div>
     <div class="price-project">
        <label class="center" for="area">ادخل عدد الأمتار
          <span class="price-center">سعرالمتر=100</span>
        </label>
        <input class="center" type="number" id="area" name="area">
        <button class="center" onclick="calculate()">احسب</button>
        <p class="center">الإجمالي: <span id="total" ></span></p>
        <a class="center" href="Card.php"><span>الدفع</span></a>
     </div>
    
       
    </div>
    <div class="container">
<div class="text-top"><h1>باقة تشطيب سوبر لوكس</h1></div>
      <div class="row row-cols-3 ">
        <div class="col"> 
          <div class="img-services" id="SER-1">
              <img src="img/محاره.png" alt="">
              <h1>محارة وجبس</h1>
          </div>
         <div class="text-ser">
          <div class="poxs"></div>
          <h5> .محارة الموقع بالكامل بؤج واوتار تسليم هندسي متكامل واعلي جوده</h5>
         
          <div class="poxs"></div>
          <h5> تركيب اسلاك فواصل بين الجدران والاجزاء الخرصانية مراعاة لعوامل التمدد</h5>
         
          <div class="poxs"></div>
          <h5>دهارة اسقف الوحدة بالكامل بمادة كيمازيت من مواد البناء الحديث المقاوم الرطوبة</h5>
         
          <div class="poxs"></div>
          <h5>جبس امبورد لكامل الوحدة كناف الماني واسقف معلقة كما بالتصميم المتفق علية</h5>
         
          <div class="poxs"></div>
          <h5>مراعاة عند تركيب الجبسن بورد تركيب شاش فواصل ومعجون الممتاز وميتال للسكوك</h5>
         
          <div class="poxs"></div>
          <h5>جبسن بورد للحمام اخضر المقاوم للرطوبة وجبسن بورد احمر للمطبخ مقاوم للرطوبة والحرارة كناف الماني</h5>
         </div>
      </div>
        <div class="col">
          
          <div class="img-services"id="SER-1">
              <img src="img/سباكه.webp" alt="">
              <h1>السباكة</h1>
          </div>
         <div class="text-ser">
          <div class="poxs"></div>
          <h5>مواسير مياه اكوا ثيرم</h5>
         
          <div class="poxs"></div>
          <h5>الصرف حمزة وعمل مواسير صرف التكييفات سمارت 1 بوصة</h5>
         
          <div class="poxs"></div>
          <h5>صرف لبلاعات البلكونات وتأسيس مخارج فلتر ومخارج غسالة</h5>
         
          <div class="poxs"></div>
          <h5>تركيب خلاطات ايديال استنادرد للحمامات والمطبخ </h5>
         
          <div class="poxs"></div>
          <h5>تركيب احواض ديروفيت وقواعد دفن ايديال ستنادرد او سمارت حسب اختيار العميل</h5>
         
          <div class="poxs"></div>
          <h5>حله ستيل هاينز للمطبخ كوري</h5>
         
          <div class="poxs"></div>
          <h5>الاحواض بها تقفيلات رخام غاطس ويو بي في سي المقاوم للمياه</h5>
         
          <div class="poxs"></div>
          <h5> بانيو الطيب وكابينة شاور ان وجد مع عمل جلسة رخام داخل الكابين شاور حسب اختيار العميل.</h5>
         
          <div class="poxs"></div>
          <h5>تركيب سماعات دوش للحمامات</h5>
         </div>  

        </div>  
        <div class="col">
           
          <div class="img-services"id="SER-2">
              <img src="img/كهرباء.webp" alt="">
              <h1>الكهرباء</h1>
          </div>
         <div class="text-ser">
          <div class="poxs"></div>
          <h5>تأسيس جميع الاسلاك السويدي الأصلي</h5>
         
          <div class="poxs"></div>
          <h5>اسلاك 6 ملم للتكييفات والسخانات</h5>
         
          <div class="poxs"></div>
          <h5>علب ماجيك وخراطيم علاء الدين الاصلي</h5>
         
          <div class="poxs"></div>
          <h5>لوحة فينوس 24 خط</h5>
         
          <div class="poxs"></div>
          <h5>تأسيس وتركيب لوحة خدمات للراوتر والدش</h5>
         
          <div class="poxs"></div>
          <h5>تأسيس الجبسن بورد اسلاك 2 ملم للأسبوتات وتركيب سبوتات ليد السراج للجبسن بورد.</h5>
         
          <div class="poxs"></div>
          <h5>تركيب ليد دوبل لبيت النور الداخلي وعمل كشافات طوارىء لكامل الوحدة</h5>
         
          <div class="poxs"></div>
          <h5>  تركيب اوشاش صانش وفيش ومفاتيح كهرباء اسباني</h5>
         
          <div class="poxs"></div>
          <h5>وتغذية السخانات بسلك 6 ملم وسلك 3 ملم للغرف ومفاتيح التكييف شنايدر.</h5>
         </div>
         
        </div>

        <div class="col">
          <div class="img-services"id="SER-2">
              <img src="img/دهان.png" alt="">
              <h1>دهان وديكور</h1>
          </div>
         <div class="text-ser">
          <div class="poxs"></div>
          <h5>تجليخ الحوائط بحجر جلخ لازالة الرمال العالقه بالاسطح</h5>
         
          <div class="poxs"></div>
          <h5>دهان مادة سيلر مائى لتثبيت الاسطح</h5>
         
          <div class="poxs"></div>
          <h5>سحب 4 طبقات معجون وواجهين بطانه ووجهين تشطيب مع تأسيس الجبسن بورد جي ال سي</h5>
         
          <div class="poxs"></div>
          <h5>دهان جميع ابواب الوحده دوكو او بليستر كما يطلبه العميل مع مراعاة اكواد الالوان كما بالتصميم المتفق عليه</h5>
         
          <div class="poxs"></div>
          <h5>ورق حائط واعمال خشبية تجليد واستيل وبانوهات خشبيه كما بالتصميم</h5>
         </div>
         
        </div>
        
        <div class="col">
          <div class="img-services" id="SER-3">
              <img src="img/نجاره.png" alt="">
              <h1>نجارة والوميتال</h1>
          </div>
         <div class="text-ser">
          <div class="poxs"></div>
          <h5>الوميتال بي اس صغير سلك امريكي وكاوتش واكسسوار تركي</h5>
         
          <div class="poxs"></div>
          <h5>باب الشقة الرئيسي مصفح تركي</h5>
         
          <div class="poxs"></div>
          <h5>تركيب حلوق 2 بوصة للأبواب</h5>
         
          <div class="poxs"></div>
          <h5>عمل ابواب لكل الغرفة خشب سويد وقشرة ارو وكوالين ايطالي ومقابض تركيب</h5>
         
          <div class="poxs"></div>
          <h5>دهان الابواب دوكو فرن او بليستر او استر حسب اختيار العميل</h5>
         </div>
         
        </div>

        <div class="col">
          <div class="img-services"id="SER-3">
              <img src="img/بلاط.png" alt="">
              <h1>البلاط</h1>
          </div>
         <div class="text-ser">
          <div class="poxs"></div>
          <h5>عزل الحمام والمطبخ بمادة سيكا 107 من كيماويات البناء الحديث مع مراعاة عمل رقبة زجاجة</h5>
         
          <div class="poxs"></div>
          <h5>سيراميك كيلوباترا قطع ليزر لارضيات الغرف او باركيه سيراميك كليوباترا 15 * 70 فرز اول حسب اختيار العميل</h5>
         
          <div class="poxs"></div>
          <h5>حوائط حمامات ومطابخ كيلوباترا فرز اول</h5>
         
          <div class="poxs"></div>
          <h5>بورسالين كيلوباترا للريسيبشن والطرقة</h5>
         </div>
         
      </div>
      <div class="col-12">
        <div class="img-services"id="SER-3">
            <h1>بنود اضافية</h1>
        </div>
       <div class="text-ser">
        <div class="poxs"></div>
        <h5>نقطتين اسمارت للتحكم في الاضاءة والتكييف</h5>
       
        <div class="poxs"></div>
        <h5>ساوند سيستم</h5>
       
       </div>
       
    </div>
   </div>
   <div class="price-project">
      <label class="center" for="areaa">ادخل عدد الأمتار
        <span class="price-center">سعرالمتر=200</span>
      </label>
      <input class="center" type="number" id="areaa" name="areaa">
      <button class="center" onclick="calculatea()">احسب</button>
      <p class="center">الإجمالي: <span id="totall" ></span></p>
      <a class="center" href="Card.php"><span>الدفع</span></a>

   </div>
  
     
  </div>

  </div>
</main>

<footer>
    <div id="fotre">
    <div id="ahmed">Call us toll-free at <SPan class="asd">823838298329</SPan></div>
    <P>All contents © 2020 <a href="google.com" target="_self">rcc dignd </a> Egypt. All rights reserved.</P>
    </div>
</footer>

<script>
  function calculate() {
    // احصل على قيمة عدد الأمتار
    var area = document.getElementById("area").value;

    // حدد سعر المتر
    var pricePerMeter = 100;

    // حسب الإجمالي
    var total = area * pricePerMeter;

    // عرض الإجمالي في الصفحة
    document.getElementById("total").innerHTML = total;
  }
</script>





<script>
  function calculatea() {
    // احصل على قيمة عدد الأمتار
    var areaa = document.getElementById("areaa").value;

    // حدد سعر المتر
    var pricePerMeterr = 200;

    // حسب الإجمالي
    var totall = areaa * pricePerMeterr;

    // عرض الإجمالي في الصفحة
    document.getElementById("totall").innerHTML = totall;
  }
</script>

    <script src="js/jquery-3.6.0.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>