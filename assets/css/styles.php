<!--
================================================================================================
Autor: Alejandro Roces Fernandez
Última Modificación: 12.02.2025
Versión: 1.0

En este archivo se configura los estilos generales que van a ser utilizados durante toda la 
pagina web estableciendo como comunenes los siguientes campos:
    - color de fondo de la aplicacion web
    - color del header
    - color del subheader
    - color de los textos en difernetes niveles tales como h2,h3 o aquellos que requiera el admin
    - color del footer
================================================================================================
-->
<link rel="stylesheet" href="../../assets/css/globales.php">
<style>
/*body*/
body {
    background-color:var(--color-fondo) ;
}

/*header*/
.header2 {
    background-color: var(--color-header);
}

/*h2*/
.section h2 {
    color: var(--color-texto)   ;
}
.viñeta h2 {
    color: var(--color-texto);
}

h2{
    color: var(--color-texto);
  
}

/*h3*/
.card h3 {
    color: var(--color-texto);
}
h3{
    color: var(--color-texto);
}

/*h4*/
.card h4 {
    color: var(--color-texto);
}
h4{
    color: var(--color-texto);
}

/*footer*/
footer {
    background-color: var(--color-header);
}

.viñeta{
    color: var(--color-texto);
}
.viñeta ul li {
    border-left: 5px solid var(--color-texto);;

}
.viñeta p:last-child {
    color:var(--color-texto);

}
</style>

