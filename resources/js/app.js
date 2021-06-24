require('./bootstrap');

$("#eliminarModal").on("show.bs.modal", function(event) {
    let click = $(event.relatedTarget);
    let link = click.data("link"); 
    let modal = $(this);
    let form = modal.find("#envio");
    console.log(form);
    form.attr('action', link);
});

$("#modificarModal").on("show.bs.modal", function(event) {
  let click = $(event.relatedTarget);
  let link = click.data("link"); 
  let modal = $(this);
  let form = modal.find("#envio");
  form.find('#pers_nombre').val(click.parents("tr").find("td").eq(0).text())  
  form.find('#pers_fijo').val(click.parents("tr").find("td").eq(1).text())
  form.find('#pers_celular').val(click.parents("tr").find("td").eq(2).text())
  console.log(form);
  console.log(form.find("#pers_nombre"));
  form.attr('action', link);
});
