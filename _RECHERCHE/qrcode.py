# https://pysource.com/2019/02/28/scanning-qr-code-opencv-with-python/
# 
# pip3 install opencv-python
# pip3 install numpy
# pip3 install pyzbar
# brew install zbar

import cv2
import numpy as np
import pyzbar.pyzbar as pyzbar


image = cv2.imread("pysource_qrcode.png")


decodedObjects = pyzbar.decode(image)
for obj in decodedObjects:
	print("Type:", obj.type)
	print("Data: ", obj.data, "\n")


cap = cv2.VideoCapture(0)
# font = cv2.FONT_HERSHEY_PLAIN

while True:
	_, frame = cap.read()

	decodedObjects = pyzbar.decode(frame)
	for obj in decodedObjects:
		print("Data: ", obj.data, "\n")
		# cv2.putText(frame, str(obj.data), (50, 50), font, 2, (255, 0, 0), 3)