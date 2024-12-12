const express = require('express');
const multer = require('multer');
const { Octokit } = require('@octokit/rest');

const app = express();
const upload = multer();
const octokit = new Octokit({
  auth: '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',
});

app.post('/upload', upload.single('image'), async (req, res) => {
  const { buffer, originalname } = req.file;

  try {
    await octokit.rest.repos.createOrUpdateFileContents({
      owner: 'shin0pro',
      repo: 'main',
      path: `uploads/${originalname}`,
      message: 'Upload new image',
      content: buffer.toString('base64'),
    });

    res.send('Image uploaded successfully');
  } catch (error) {
    console.error(error);
    res.status(500).send('Error uploading image');
  }
});
