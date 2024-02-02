<?php
/*
* (c) COPYRIGHT 2024, MARCO NASCIMENTO
* CAMPINAS-SP, BRASIL
* ALL RIGHTS RESERVED - TODOS DIREITOS RESERVADOS
* CONFIDENTIAL, UNPUBLISHED PROPERTY OF MARCO NASCIMENTO
* PROPRIEDADE CONFIDENCIAL, NÃO PUBLICADA DE MARCO NASCIMENTO
*/
session_start();
session_destroy();

echo "<script>alert('Você foi deslogado com sucesso!'); 
        window.location.href = '../index.html';</script>";
