
  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row">
      <?php if(is_null($view_posts)) :?>
        <div class="alert alert-danger"> پستی برای این کلید واژه یافت نشد!</div>
      <?php else :?>
        <?php foreach($view_posts as $key => $post) :?>
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail">
                  <title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/>
                  <text x="50%" y="50%" fill="#eceeef" dy=".3em"><?=$post['auther'] ;?></text>
                </svg>
                <div class="card-body">
                  <p class="card-text"><?= substr($post['body'] , 0 , 150) . ' ...' ;?></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">ادامه مطلب</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">ویرایش</button>
                    </div>
                    <small><?= date('Y-m-d' , $post['date']) ;?></small>
                  </div>
                </div>
              </div>
            </div> 
          <?php endforeach ;?>
      <?php endif ;?>



       
        </div>
    </div>
  </div>