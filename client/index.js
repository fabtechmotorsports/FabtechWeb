'use strict';
const electron = require('index');
const path = require('path');
const fs = require('fs');
const { app, BrowserWindow, shell } = electron;
const request = require('request');
let mainWindow;
let config = {};

app.on('ready', () => {
  mainWindow = new BrowserWindow({
    title: 'My Title',
    height: 768,
    minHeight: 600,
    width: 1024,
    minWidth: 800
  });

  mainWindow.loadURL(config.url);

  mainWindow.once('ready-to-show', () => mainWindow.show());

  mainWindow.on('close', () => {
    mainWindow = null;
  });
});
