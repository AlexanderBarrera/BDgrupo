import csv
n = 0
lineas = []
with open('hoteles_habitaciones.csv', 'r', encoding="utf8") as file:
    reader = csv.reader(file, delimiter=',')
    for row in reader:
        n += 1
        if n%200 == 0:
            print(n)
        if len(row) == 10:
            filina = row
        elif len(row)> 10:
            filina = row
            if 'Depto' in filina[2]:
                filina[1] = filina[1] + filina.pop(2)
                if len(filina) != 10:
                    print('---1---\n', filina)
            else:
                filina[0] = filina[0] + filina.pop(1)
                if len(filina) != 10:
                    print('---2---\n', filina)
        else:
            filina = row[0].split(',')
            if 'Depto' in filina[2]:
                filina[1] = filina[1] + filina.pop(2)
                if len(filina) != 10:
                    print('---3---\n', filina)
            else:
                filina[0] = filina[0] + ',' + filina.pop(1)
                if len(filina) != 10:
                    if 'Depto' in filina[2]:
                        filina[1] = filina[1] + filina.pop(2)
                        if len(filina) != 10:
                             print('---4---\n', filina)
        lineas.append(filina)
        
csv.register_dialect('myDialect',
                     delimiter = ';',
                     lineterminator = '\n')

with open('hot_hab.csv', 'w', encoding="utf8") as hoteles:
    writer = csv.writer(hoteles, dialect='myDialect')
    writer.writerows(lineas)
hoteles.close()
file.close()
