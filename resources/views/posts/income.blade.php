<style>
.income{
    background-color:white;
}
</style>                     
<div class="income">
                            <input id="income_type" class="income_type" type="radio" name="income_type" value="1" onclick="income();"> 年収
                            <input id="income_type" class="income_type" type="radio" name="income_type" value="2" onclick="income();"> 月収
                            <input id="income_type" class="income_type" type="radio" name="income_type" value="3" onclick="income();"> 日給
                            <input id="income_type" class="income_type" type="radio" name="income_type" value="4" onclick="income();"> 時給
                        

                            <br>
                            <select class="kagen select" id="exampleFormControlSelect1" name="product_subcategory" class="is-invalid" onchange="jougen();">
                            <option value=0 selected class="">下限なし</option>
                            <option value=1000000 class="nenshu" data-val="1">100万円</option>
                            <option value=2000000 class="nenshu" data-val="1">200万円</option>
                            <option value=3000000 class="nenshu" data-val="1">300万円</option>
                            <option value=4000000 class="nenshu" data-val="1">400万円</option>
                            <option value=5000000 class="nenshu" data-val="1">500万円</option>
                            <option value=6000000 class="nenshu" data-val="1">600万円</option>
                            <option value=7000000 class="nenshu" data-val="1">700万円</option>
                            <option value=8000000 class="nenshu" data-val="1">800万円</option>
                            <option value=9000000 class="nenshu" data-val="1">900万円</option>
                            <option value=10000000 class="nenshu" data-val="1">1000万円</option>
                            <option value=100000 class="gesshu" data-val="2">10万円</option>
                            <option value=200000 class="gesshu" data-val="2">20万円</option>
                            <option value=300000 class="gesshu" data-val="2">30万円</option>
                            <option value=400000 class="gesshu" data-val="2">40万円</option>
                            <option value=500000 class="gesshu" data-val="2">50万円</option>
                            <option value=600000 class="gesshu" data-val="2">60万円</option>
                            <option value=700000 class="gesshu" data-val="2">70万円</option>
                            <option value=800000 class="gesshu" data-val="2">80万円</option>
                            <option value=900000 class="gesshu" data-val="2">90万円</option>
                            <option value=1000000 class="gesshu" data-val="2">100万円</option>
                            <option value=10000 class="nikkyu" data-val="3">1万円</option>
                            <option value=20000 class="nikkyu" data-val="3">2万円</option>
                            <option value=30000 class="nikkyu" data-val="3">3万円</option>
                            <option value=40000 class="nikkyu" data-val="3">4万円</option>
                            <option value=50000 class="nikkyu" data-val="3">5万円</option>
                            <option value=60000 class="nikkyu" data-val="3">6万円</option>
                            <option value=70000 class="nikkyu" data-val="3">7万円</option>
                            <option value=80000 class="nikkyu" data-val="3">8万円</option>
                            <option value=90000 class="nikkyu" data-val="3">9万円</option>
                            <option value=100000 class="nikkyu" data-val="3">10万円</option>
                            <option value=1000 class="jikyu" data-val="4">1000円</option>
                            <option value=2000 class="jikyu" data-val="4">2000円</option>
                            <option value=3000 class="jikyu" data-val="4">3000円</option>
                            <option value=4000 class="jikyu" data-val="4">4000円</option>
                            <option value=5000 class="jikyu" data-val="4">5000円</option>
                            <option value=6000 class="jikyu" data-val="4">6000円</option>
                            <option value=7000 class="jikyu" data-val="4">7000円</option>
                            <option value=8000 class="jikyu" data-val="4">8000円</option>
                            <option value=9000 class="jikyu" data-val="4">9000円</option>
                            <option value=10000 class="jikyu" data-val="4">1万円</option>
                            </select>
                            〜   
                            <select class="jougen select" id="exampleFormControlSelect1" name="product_subcategory" class="is-invalid" onchange="kagen();">
                            <option value=100000000 selected class="">上限なし</option>
                            <option value=1000000 class="nenshu" data-val="1">100万円</option>
                            <option value=2000000 class="nenshu" data-val="1">200万円</option>
                            <option value=3000000 class="nenshu" data-val="1">300万円</option>
                            <option value=4000000 class="nenshu" data-val="1">400万円</option>
                            <option value=5000000 class="nenshu" data-val="1">500万円</option>
                            <option value=6000000 class="nenshu" data-val="1">600万円</option>
                            <option value=7000000 class="nenshu" data-val="1">700万円</option>
                            <option value=8000000 class="nenshu" data-val="1">800万円</option>
                            <option value=9000000 class="nenshu" data-val="1">900万円</option>
                            <option value=10000000 class="nenshu" data-val="1">1000万円</option>
                            <option value=100000 class="gesshu" data-val="2">10万円</option>
                            <option value=200000 class="gesshu" data-val="2">20万円</option>
                            <option value=300000 class="gesshu" data-val="2">30万円</option>
                            <option value=400000 class="gesshu" data-val="2">40万円</option>
                            <option value=500000 class="gesshu" data-val="2">50万円</option>
                            <option value=600000 class="gesshu" data-val="2">60万円</option>
                            <option value=700000 class="gesshu" data-val="2">70万円</option>
                            <option value=800000 class="gesshu" data-val="2">80万円</option>
                            <option value=900000 class="gesshu" data-val="2">90万円</option>
                            <option value=1000000 class="gesshu" data-val="2">100万円</option>
                            <option value=10000 class="nikkyu" data-val="3">1万円</option>
                            <option value=20000 class="nikkyu" data-val="3">2万円</option>
                            <option value=30000 class="nikkyu" data-val="3">3万円</option>
                            <option value=40000 class="nikkyu" data-val="3">4万円</option>
                            <option value=50000 class="nikkyu" data-val="3">5万円</option>
                            <option value=60000 class="nikkyu" data-val="3">6万円</option>
                            <option value=70000 class="nikkyu" data-val="3">7万円</option>
                            <option value=80000 class="nikkyu" data-val="3">8万円</option>
                            <option value=90000 class="nikkyu" data-val="3">9万円</option>
                            <option value=100000 class="nikkyu" data-val="3">10万円</option>
                            <option value=1000 class="jikyu" data-val="4">1000円</option>
                            <option value=2000 class="jikyu" data-val="4">2000円</option>
                            <option value=3000 class="jikyu" data-val="4">3000円</option>
                            <option value=4000 class="jikyu" data-val="4">4000円</option>
                            <option value=5000 class="jikyu" data-val="4">5000円</option>
                            <option value=6000 class="jikyu" data-val="4">6000円</option>
                            <option value=7000 class="jikyu" data-val="4">7000円</option>
                            <option value=8000 class="jikyu" data-val="4">8000円</option>
                            <option value=9000 class="jikyu" data-val="4">9000円</option>
                            <option value=10000 class="jikyu" data-val="4">1万円</option>
                            </select>    
                            
                            <br>

</div>
    <script src="{{ asset('income.js') }}" defer></script>