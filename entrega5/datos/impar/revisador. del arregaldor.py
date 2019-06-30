import csv
lineas = []
k = 0
with open('hot_hab.csv', 'r', encoding="utf8") as hoteles:
    reader = csv.reader(hoteles, delimiter=';')
    for row in reader:
        k += 1
        if k % 500 == 0:
            print(k)
        if len(row) > 1:
            lineas.append(row)
print(len(lineas))
hoteles.close()
    
