'''
Produit la structure du Body en fonction du fichier csv
    pour chaque mois il produit une div
        dans laquelle il met chaque date


@EXPORT:
    ...
    <div class="month" data-month="12">
        <h1 class="title">decembre 2020</h1>
        <ul class="all-date">
            <li attr="01-12-2020" class="date"><mark>01/12/2020</mark></li>
            <li attr="02-12-2020" class="date"><mark>02/12/2020</mark></li>
                ....
        </ul>
    </div>
    ...

'''


# dépendances
import json
import numpy
import pandas as pd
import dominate
from dominate.tags import *

# Import du fichier CSV
data = pd.read_csv('manchette.csv', encoding='utf8', error_bad_lines=False, sep=';')
# Inverse l'ordre (pour avoir un ordre chronologique)
data = data.iloc[::-1]


oldDate = ""
oldMMYYY = ""

_html = html()
_body = _html.add(body())

MONTH = ["janvier", "fevrier", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "decembre"]

# Itération dans le CSV
for index, date in enumerate(data["Date"]):

    # Vérifie si le mois est nouveau
    if date[-7:] == oldMMYYY:
        # le mois n'est pas nouveau
        pass
    # nouveau mois
    else:
    
        month  = _body.add(div(cls='month', data_month=f'{date[3:5]}'))
        month.add(h1(f"{MONTH[int(date[3:5]) - 1]} {date[-4:]}",cls="title"))

        all_date = month.add(ul(cls="all-date"))

        oldMMYYY = date[-7:]
    # verifie si la date est nouvelle
    if(date == oldDate):
        pass
    # Nouvelle date
    else:
        day = all_date.add(li(cls="date", attr=f"{date.replace('/', '-')}", __pretty=False))
        day.add(mark(f"{date}",  __pretty=False))

    oldDate = date

# Ajout de la navbar
_body.add(nav(id="nav_QRCODE"))

# Enregistre l'html
with open("index_body.html", 'w+', encoding='utf-8') as f:
    f.write(str(_body))    
