@echo off
setlocal enabledelayedexpansion

:: Demander l'extension (sans point) et le préfixe
set /p extension=👉 Quelle extension souhaitez-vous renommer ? (ex: webp, jpg, png, txt) 
set /p prefix=👉 Quel préfixe souhaitez-vous utiliser ? 

:: Vérifie qu'on a bien l'extension
if "%extension%"=="" (
    echo ❌ Erreur : vous devez entrer une extension.
    pause
    exit /b
)

:: Initialisation du compteur
set /a count=1

echo.
echo 🚀 Renommage des fichiers .%extension% avec le préfixe "%prefix%"...

:: Boucle sur les fichiers avec l’extension choisie
for %%f in (*.%extension%) do (
    set "newname=%prefix%!count!.%extension%"
    ren "%%f" "!newname!"
    set /a count+=1
)

echo.
echo ✅ Renommage terminé !
pause