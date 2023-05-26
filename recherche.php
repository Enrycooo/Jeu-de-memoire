
<div class="container recherche">
  <div class="row main-row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
      <form id="searchform" class="form">
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-check" aria-hidden="true"></i>
              <i class="fa fa-spinner" style="display:none" aria-hidden="true"></i>
            </div>
            <input type="query" class="form-control form-control-lg" id="query" placeholder="Raison sociale, Siren, Adresse, …">
            <span class="input-group-btn">
              <button class="btn btn-primary btn-lg" type="submit">
                <span class="normal">Chercher</span>
              </button>
            </span>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div id="results" class="row"></div>
</div>


  <div class="col-sm-4">
    <div class="card societe">
      <div class="card-body">
        <h4 class="card-title">
          <span data-content="nomen_long"></span>
        </h4>
        <p class="card-text">
          <span class="text-success" data-content="siret"></span><br />
          <span data-content="l6_normalisee"></span><br />
          <span data-content="l7_normalisee"></span>
        </p>
        <a data-href="buyLink" class="btn btn-sm btn-success">Commander</a>
      </div>
    </div>
  </div>


<script type="text/javascript">
  var processes = 0;

  var produits = [];

  function search(evt) {
    if (evt) {
      evt.preventDefault();
    }

    var q = $("#query").val();

    if (q != "") {

      processes++;
      $(".fa-check").hide();
      $(".fa-spinner").show();

      $.getJSON( "/commande/get_societes/" + q, function( data ) {
        var res = data;

        processes--;
        if (processes == 0) {
          $(".fa-check").show();
          $(".fa-spinner").hide();
          for (var i in res) {
            if (res.hasOwnProperty(i)) {
              res[i].buyLink = "/commande/ajout/" + res[i].idsociete;
            }
          }
          $("#results").loadTemplate($("#societe"), res);
        }
      });
    }
  }

  $(document).ready(function(){
    $.getJSON( "/commande/get_produits/", function( data ) {
      produits = data;
    });
    //$("#searchform").on('input', search);
    $("#searchform").on('submit', search);

    <?php if ($q): ?>
      $("#query").val('<?php echo $q ?>');
      $("#searchform").submit();
    <?php endif; ?>
  })
</script>

