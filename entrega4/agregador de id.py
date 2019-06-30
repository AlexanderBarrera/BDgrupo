with open("messages.json", "r", encoding = "utf-8") as file:
    lines = file.readlines()

k = 0
with open("mensajes.json", "w", encoding = "utf-8") as new_file:
    for line in lines:
        if "date" in line:
            new_file.write('        ' + line.strip() + ",\n")
            new_file.write('        "mid": {}\n'.format(k))
            k += 1
        else:
            new_file.write(line)
file.close()
new_file.close()
