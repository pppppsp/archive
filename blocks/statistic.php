<div class="container mt-6">
    <h1 class="has-text-centered has-text-weight-bold is-size-3 has-text-info">Статистика</h1>
    <div class="list is-flex is-justify-content-space-between mt-6 is-flex-wrap-wrap">
        <div class = "box p-1" style = "width:300px; height:150px;">
            <p class = "has-text-centered is-size-1 has-text-weight-bold has-text-link"><? echo $number_of_account; ?></p>
            <p class = "has-text-centered is-size-5">Пользователей</p>
        </div>
        <div class = "box p-1" style = "width:300px; height:150px;">
            <p class = "has-text-centered is-size-1 has-text-weight-bold has-text-link"><? echo $resultApprovedD[0]['count'];?></p>
            <p class = "has-text-centered is-size-5">Проверено дипломов</p>
        </div>
        <div class = "box p-1" style = "width:300px; height:150px;">
            <p class = "has-text-centered is-size-1 has-text-weight-bold has-text-link"><? echo round($resultScore[0]['score'],2);?></p>
            <p class = "has-text-centered is-size-5">Средний балл</p>
        </div>
        <div class = "box p-1" style = "width:300px; height:150px;">
            <p class = "has-text-centered is-size-1 has-text-weight-bold has-text-link"><? echo $resultTheBest[0]['count'];?></p>
            <p class = "has-text-centered is-size-5">Лучших пользователей</p>
        </div>
    </div>
</div>